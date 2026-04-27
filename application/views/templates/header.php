<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?= $judul ?></title>
    <!-- Tailwind + Google Fonts + Material Icons -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,200..800;1,200..800&family=Public+Sans:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: "#0F6E6B",
                            light: "#3D8F8C",
                            dark: "#0A5552",
                            faded: "#E6F4F3",
                            container: "#CBF1EF",
                        },
                        secondary: {
                            DEFAULT: "#866C4A",
                            light: "#A08768",
                            container: "#F2E6D9",
                        },
                        tertiary: {
                            DEFAULT: "#B4682D",
                            container: "#FDE9DE",
                        },
                        surface: {
                            DEFAULT: "#FDFBF7",
                            container: "#F9F5EF",
                            "container-low": "#F4EFE8",
                            "container-lowest": "#FFFFFF",
                        },
                        on: {
                            surface: "#1E2A2A",
                            "surface-variant": "#4F5B5B",
                        },
                        error: "#D44C3A",
                        outline: "#B0B8B2",
                        "outline-variant": "#D1D9D2",
                        background: "#F8F6F2",
                    },
                    borderRadius: {
                        DEFAULT: "0.75rem",
                        lg: "1rem",
                        xl: "1.25rem",
                        "2xl": "1.5rem",
                        full: "9999px",
                    },
                    fontFamily: {
                        headline: ["Newsreader", "serif"],
                        body: ["Public Sans", "sans-serif"],
                    },
                    boxShadow: {
                        soft: "0 8px 20px rgba(0,0,0,0.03), 0 2px 6px rgba(0,0,0,0.02)",
                        card: "0 12px 24px -12px rgba(0,0,0,0.08)",
                    },
                }
            }
        }
    </script>
    
    <style>
        * { -webkit-font-smoothing: antialiased; }
        body { background-color: #F8F6F2; font-family: 'Public Sans', sans-serif; }
        .font-serif { font-family: 'Newsreader', serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .card-hover { transition: all 0.25s ease; }
        .card-hover:hover { transform: translateY(-3px); box-shadow: 0 20px 28px -12px rgba(0,0,0,0.12); }
        .btn-action:active { transform: scale(0.96); }
        .animate-fade-in { animation: fadeIn 0.4s ease; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>

