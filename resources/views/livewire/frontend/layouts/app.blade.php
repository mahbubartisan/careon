<!DOCTYPE html>
<html lang="en">
    @php
        $settings = App\Models\Settings::with("favIcon")->first();
    @endphp

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        {{-- <title>CareOn - Professional Healthcare At Home | Bangladesh</title> --}}
        <title>@stack("title")</title>
        <link rel="website icon" type="png" href="{{ asset(@$settings->favIcon?->path) }}">
        <!-- Meta -->
        <meta name="description" content="@yield("description")">

        <!-- Open Graph -->
        <meta property="og:title" content="@yield("og_title", "CareOn - Professional Healthcare At Home | Bangladesh")">
        <meta property="og:description" content="@yield("og_description")">
        <meta property="og:image" content="@yield("og_image", asset("default-og.jpg"))">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">

        <link
            href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
            rel="stylesheet" />
        @vite("resources/css/app.css")
        <!-- Include Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet" />

        <style>
            /* For Firefox */
            input[type="number"] {
                -moz-appearance: textfield;
            }

            /* For Chrome, Safari, Edge, Opera */
            input[type="number"]::-webkit-outer-spin-button,
            input[type="number"]::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Custom scrollbar styles */
            ::-webkit-scrollbar {
                width: 5px;
                /* Adjust width of the scrollbar */
            }

            ::-webkit-scrollbar-thumb {
                background-color: #d1d6e0;
                /* Thumb color (gray) */
                border-radius: 10px;
                /* Rounded corners for the scrollbar */
            }

            ::-webkit-scrollbar-track {
                background-color: #f3f4f6;
                /* Track color (light gray) */
                border-radius: 10px;
                /* Rounded corners for the track */
            }

            /* Optionally, you can style the scrollbar on hover */
            ::-webkit-scrollbar-thumb:hover {
                background-color: #4b5563;
                /* Darker thumb color on hover */
            }

            /* Core Summernote content styles */
            .note-editable {
                line-height: 1.6;
                font-size: 14px;
                color: #333;
                word-wrap: break-word;
            }

            .note-editable p {
                margin: 0 0 10px;
            }

            /* Improved Summernote heading styles */
            .note-editable h1,
            .note-editable h2,
            .note-editable h3,
            .note-editable h4,
            .note-editable h5,
            .note-editable h6 {
                font-weight: 600;
                line-height: 1.3;
                margin-top: 1.6em;
                margin-bottom: 0.6em;
                color: #1f2937;
                /* Tailwind gray-800 */
            }

            .note-editable h1 {
                font-size: 2rem;
                /* ~32px */
            }

            .note-editable h2 {
                font-size: 1.75rem;
                /* ~28px */
            }

            .note-editable h3 {
                font-size: 1.5rem;
                /* ~24px */
            }

            .note-editable h4 {
                font-size: 1.25rem;
                /* ~20px */
            }

            .note-editable h5 {
                font-size: 1.125rem;
                /* ~18px */
            }

            .note-editable h6 {
                font-size: 1rem;
                /* ~16px */
                color: #374151;
                /* slightly lighter (gray-700) */
            }


            .note-editable ul,
            .note-editable ol {
                padding-left: 40px;
                margin-bottom: 10px;
            }

            .note-editable blockquote {
                padding: 10px 20px;
                margin: 0 0 20px;
                font-size: 17.5px;
                border-left: 5px solid #eee;
                color: #666;
            }

            .note-editable a {
                color: #0d6efd;
                text-decoration: underline;
            }

            .note-editable img {
                max-width: 100%;
                height: auto;
            }

            .note-editable table {
                width: 100% !important;
                border-collapse: collapse;
                margin-bottom: 15px;
            }

            .note-editable table th,
            .note-editable table td {
                border: 1px solid #ddd;
                padding: 8px;
            }

            .ql-editor ul {
                list-style-type: disc;
                margin-left: 20px;
            }

            .ql-editor ol {
                list-style-type: decimal;
                margin-left: 20px;
            }

            .ql-editor strong {
                font-weight: bold;
            }

            .ql-editor em {
                font-style: italic;
            }

            .ql-editor u {
                text-decoration: underline;
            }

            .ql-editor h1 {
                font-size: 1.75rem;
                font-weight: bold;
            }

            .ql-editor h2 {
                font-size: 1.5rem;
                font-weight: bold;
            }

            .ql-editor a {
                color: blue;
                text-decoration: underline;
            }
        </style>

    </head>

    <body class="font-[Inter]">
        <!-- Navbar -->
        @include("livewire.frontend.layouts.navbar")

        @yield("content")

        <!-- Footer -->
        {{-- @include("livewire.frontend.layouts.footer") --}}
        @livewire('frontend.footer.footer')
    </body>

</html>
