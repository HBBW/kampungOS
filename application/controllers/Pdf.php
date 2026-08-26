<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Letter_model');
    }

    public function surat($request_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }

        $request = $this->Letter_model->get_request_by_id($request_id);
        if (!$request) {
            show_404();
        }

        if ($request->status !== 'approved') {
            show_error('Surat belum disetujui', 403);
        }

        $letter = $this->Letter_model->get_letter_by_request($request_id);
        if (!$letter) {
            show_error('Surat belum diterbitkan', 404);
        }

        $html = $this->build_letter_html($request, $letter);

        ob_start();
        try {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', false);
            $options->set('isPhpEnabled', true);
            $options->set('defaultFont', 'sans-serif');

            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            $filename = 'Surat_' . strtoupper($request->type) . '_' . $letter->letter_number . '.pdf';
            $dompdf->stream($filename, ['Attachment' => true]);
        } catch (\Exception $e) {
            ob_end_clean();
            show_error('Gagal generate PDF: ' . $e->getMessage(), 500);
        }
        ob_end_flush();
    }

    public function keuangan()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }

        $this->load->model('Cash_model');
        $transactions = $this->Cash_model->get_all(100);
        $balance = $this->Cash_model->get_balance();
        $month_income = $this->Cash_model->get_month_income();
        $month_expense = $this->Cash_model->get_month_expense();

        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <style>
                body { font-family: "Times New Roman", Times, serif; font-size: 11pt; margin: 0; padding: 0; }
                .container { padding: 30px 40px; }
                .header { text-align: center; margin-bottom: 20px; border-bottom: 3px double #000; padding-bottom: 15px; }
                .header h2 { margin: 0; font-size: 13pt; text-transform: uppercase; letter-spacing: 2px; }
                .header p { margin: 2px 0; font-size: 9pt; color: #333; }
                .summary { display: flex; justify-content: space-around; margin: 20px 0; }
                .summary-box { text-align: center; padding: 10px 20px; border: 1px solid #ccc; border-radius: 5px; }
                .summary-box .label { font-size: 9pt; color: #666; text-transform: uppercase; }
                .summary-box .value { font-size: 14pt; font-weight: bold; margin-top: 4px; }
                table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 9pt; }
                th { background-color: #f0f0f0; padding: 6px 8px; text-align: left; border: 1px solid #ccc; font-size: 8pt; text-transform: uppercase; }
                td { padding: 5px 8px; border: 1px solid #ddd; }
                .income { color: #2a6038; font-weight: bold; }
                .expense { color: #D44C3A; font-weight: bold; }
                .footer { margin-top: 20px; padding: 10px; border: 1px solid #ccc; font-size: 8pt; color: #666; text-align: center; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2>Laporan Keuangan RT</h2>
                    <p>Kampung Sari RT 02 / RW 04</p>
                    <p>Dicetak: ' . date('d F Y H:i') . '</p>
                </div>

                <div class="summary">
                    <div class="summary-box">
                        <div class="label">Total Saldo</div>
                        <div class="value">Rp ' . number_format($balance, 0, ',', '.') . '</div>
                    </div>
                    <div class="summary-box">
                        <div class="label">Pemasukan Bulan Ini</div>
                        <div class="value income">Rp ' . number_format($month_income, 0, ',', '.') . '</div>
                    </div>
                    <div class="summary-box">
                        <div class="label">Pengeluaran Bulan Ini</div>
                        <div class="value expense">Rp ' . number_format($month_expense, 0, ',', '.') . '</div>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                            <th>Tipe</th>
                            <th style="text-align:right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($transactions as $t) {
            $is_income = ($t->type === 'income');
            $html .= '<tr>
                <td>' . date('d M Y', strtotime($t->created_at)) . '</td>
                <td>' . htmlspecialchars($t->description ?? '-') . '</td>
                <td>' . htmlspecialchars($t->category ?? '-') . '</td>
                <td>' . ($is_income ? 'Pemasukan' : 'Pengeluaran') . '</td>
                <td class="' . ($is_income ? 'income' : 'expense') . '" style="text-align:right">' . ($is_income ? '+' : '-') . ' Rp ' . number_format($t->amount, 0, ',', '.') . '</td>
            </tr>';
        }

        $html .= '</tbody></table>

                <div class="footer">
                    Laporan ini dicetak secara digital oleh Sistem KampungOS<br>
                    Total: ' . count($transactions) . ' transaksi | Saldo Saat Ini: Rp ' . number_format($balance, 0, ',', '.') . '
                </div>
            </div>
        </body>
        </html>';

        ob_start();
        try {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', false);
            $options->set('defaultFont', 'sans-serif');

            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();

            $filename = 'Laporan_Keuangan_' . date('Y-m-d') . '.pdf';
            $dompdf->stream($filename, ['Attachment' => true]);
        } catch (\Exception $e) {
            ob_end_clean();
            show_error('Gagal generate PDF keuangan.', 500);
        }
        ob_end_flush();
    }

    private function build_letter_html($request, $letter)
    {
        $type = $request->type;
        $date = date('d F Y', strtotime($letter->generated_at));
        $letter_number = $letter->letter_number;

        $type_labels = [
            'domisili' => 'SURAT KETERANGAN DOMISILI',
            'usaha' => 'SURAT KETERANGAN USAHA',
            'nikah' => 'SURAT PENGANTAR NIKAH',
            'skck' => 'SURAT KETERANGAN KEPOLISIAN (SKCK)'
        ];

        $title = $type_labels[$type] ?? 'SURAT KETERANGAN';

        $nik = $request->nik ?? '-';
        $kk = $request->kk_number ?? '-';
        $address = $request->address ?? '-';
        $name = $request->head_name ?? '-';
        $purpose = $request->purpose ?? '-';
        $approved_date = $request->approved_at ? date('d F Y', strtotime($request->approved_at)) : date('d F Y');

        $body = $this->get_letter_body($type, $name, $nik, $kk, $address, $purpose);

        $rt_name = htmlspecialchars($this->session->userdata('name') ?? '');

        return '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <style>
                body {
                    font-family: "Times New Roman", Times, serif;
                    font-size: 12pt;
                    line-height: 1.5;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    padding: 40px 60px;
                }
                .header {
                    text-align: center;
                    margin-bottom: 20px;
                    border-bottom: 3px double #000;
                    padding-bottom: 15px;
                }
                .header h2 {
                    margin: 0;
                    font-size: 14pt;
                    text-transform: uppercase;
                    letter-spacing: 2px;
                }
                .header p {
                    margin: 2px 0;
                    font-size: 10pt;
                    color: #333;
                }
                .letter-number {
                    text-align: center;
                    font-size: 11pt;
                    margin: 20px 0;
                }
                .letter-number strong {
                    text-decoration: underline;
                }
                .content {
                    margin: 20px 0;
                    text-align: justify;
                }
                .content p {
                    margin: 8px 0;
                }
                .table-info {
                    width: 100%;
                    margin: 15px 0;
                }
                .table-info td {
                    padding: 4px 8px;
                    vertical-align: top;
                }
                .table-info td:first-child {
                    width: 180px;
                    font-weight: bold;
                }
                .table-info td:nth-child(2) {
                    width: 20px;
                }
                .signature {
                    margin-top: 40px;
                    text-align: right;
                    padding-right: 40px;
                }
                .signature .name {
                    font-weight: bold;
                    text-decoration: underline;
                    margin-top: 40px;
                }
                .signature .position {
                    font-size: 11pt;
                }
                .footer-note {
                    margin-top: 30px;
                    padding: 10px;
                    border: 1px solid #ccc;
                    font-size: 9pt;
                    color: #666;
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2>' . $title . '</h2>
                    <p>Kampung Sari RT 02 / RW 04</p>
                    <p>Kecamatan Sukamaju, Kota Bandung</p>
                </div>

                <div class="letter-number">
                    Nomor: <strong>' . $letter_number . '</strong>
                </div>

                <div class="content">
                    ' . $body . '
                </div>

                <div class="signature">
                    <p>Bandung, ' . $date . '</p>
                    <p>Ketua RT 02 / RW 04</p>
                    <div class="name">_________________________</div>
                    <div class="position">( ' . $rt_name . ' )</div>
                </div>

                <div class="footer-note">
                    Surat ini diterbitkan secara digital oleh Sistem KampungOS.<br>
                    Nomor: ' . $letter_number . ' | Diterbitkan: ' . $approved_date . '
                </div>
            </div>
        </body>
        </html>';
    }

    private function get_letter_body($type, $name, $nik, $kk, $address, $purpose)
    {
        $intro = 'Yang bertanda tangan di bawah ini, Ketua RT 02 / RW 04 Kampung Sari, dengan ini menerangkan bahwa:';

        $info = '
            <table class="table-info">
                <tr><td>Nama</td><td>:</td><td>' . htmlspecialchars($name) . '</td></tr>
                <tr><td>NIK</td><td>:</td><td>' . htmlspecialchars($nik) . '</td></tr>
                <tr><td>No. KK</td><td>:</td><td>' . htmlspecialchars($kk) . '</td></tr>
                <tr><td>Alamat</td><td>:</td><td>' . htmlspecialchars($address) . '</td></tr>
            </table>';

        switch ($type) {
            case 'domisili':
                return '
                    <p>' . $intro . '</p>
                    ' . $info . '
                    <p>Adalah benar warga yang berdomisili di wilayah RT 02 / RW 04 Kampung Sari dan telah tinggal di alamat tersebut.</p>
                    <p>Surat keterangan ini dibuat untuk keperluan: <strong>' . htmlspecialchars($purpose) . '</strong></p>
                    <p>Demikian surat keterangan ini dibuat dengan sebenarnya dan dapat dipergunakan sebagaimana mestinya.</p>';

            case 'usaha':
                return '
                    <p>' . $intro . '</p>
                    ' . $info . '
                    <p>Adalah benar warga yang menjalankan usaha di wilayah RT 02 / RW 04 Kampung Sari.</p>
                    <p>Surat keterangan ini dibuat untuk keperluan: <strong>' . htmlspecialchars($purpose) . '</strong></p>
                    <p>Demikian surat keterangan ini dibuat dengan sebenarnya dan dapat dipergunakan sebagaimana mestinya.</p>';

            case 'nikah':
                return '
                    <p>' . $intro . '</p>
                    ' . $info . '
                    <p>Adalah benar warga yang akan melangsungkan pernikahan / telah melangsungkan pernikahan.</p>
                    <p>Surat pengantar ini dibuat untuk keperluan: <strong>' . htmlspecialchars($purpose) . '</strong></p>
                    <p>Demikian surat pengantar ini dibuat dengan sebenarnya dan dapat dipergunakan sebagaimana mestinya.</p>';

            case 'skck':
                return '
                    <p>' . $intro . '</p>
                    ' . $info . '
                    <p>Adalah benar warga yang berperilaku baik dan tidak memiliki catatan kriminal di wilayah RT 02 / RW 04 Kampung Sari.</p>
                    <p>Surat keterangan ini dibuat untuk keperluan: <strong>' . htmlspecialchars($purpose) . '</strong></p>
                    <p>Demikian surat keterangan ini dibuat dengan sebenarnya dan dapat dipergunakan sebagaimana mestinya.</p>';

            default:
                return '
                    <p>' . $intro . '</p>
                    ' . $info . '
                    <p>Surat keterangan ini dibuat untuk keperluan: <strong>' . htmlspecialchars($purpose) . '</strong></p>
                    <p>Demikian surat keterangan ini dibuat dengan sebenarnya dan dapat dipergunakan sebagaimana mestinya.</p>';
        }
    }
}
