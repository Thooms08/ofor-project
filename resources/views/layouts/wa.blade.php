<style>
    /* Styling Floating WhatsApp Button */
    .wa-float-btn {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 20px;
        right: 20px;
        background-color: #25d366; /* Warna khas WhatsApp */
        color: #ffffff;
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        box-shadow: 0px 4px 15px rgba(37, 211, 102, 0.4);
        z-index: 9999;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
        animation: pulse-wa 2s infinite;
    }

    /* Icon Styling */
    .wa-float-btn i {
        margin-top: -2px; /* Penyesuaian presisi icon ke tengah */
    }

    /* Hover Effect */
    .wa-float-btn:hover {
        transform: scale(1.1);
        background-color: #1ebe57;
        color: #ffffff;
        box-shadow: 0px 6px 20px rgba(37, 211, 102, 0.6);
        animation: none; /* Hentikan animasi pulse saat dihover */
    }

    /* Custom Tooltip CSS (Chat Admin) */
    .wa-float-btn::before {
        content: "Chat Admin";
        position: absolute;
        right: 70px;
        top: 50%;
        transform: translateY(-50%);
        background-color: #ffffff;
        color: #333333;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        font-family: inherit;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        pointer-events: none;
    }

    /* Tooltip Arrow */
    .wa-float-btn::after {
        content: "";
        position: absolute;
        right: 64px;
        top: 50%;
        transform: translateY(-50%);
        border-width: 6px;
        border-style: solid;
        border-color: transparent transparent transparent #ffffff;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
    }

    /* Tampilkan Tooltip saat Hover */
    .wa-float-btn:hover::before {
        opacity: 1;
        visibility: visible;
        right: 80px;
    }
    
    .wa-float-btn:hover::after {
        opacity: 1;
        visibility: visible;
        right: 74px;
    }

    /* Animasi Pulse Looping */
    @keyframes pulse-wa {
        0% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.6);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
        }
    }

    /* Responsif untuk Layar Kecil (Mobile) */
    @media (max-width: 768px) {
        .wa-float-btn {
            width: 55px;
            height: 55px;
            bottom: 15px;
            right: 15px;
            font-size: 28px;
        }

        /* Sembunyikan tooltip custom di mobile agar tidak menutupi layar */
        .wa-float-btn::before,
        .wa-float-btn::after {
            display: none;
        }
    }
</style>

<a href="https://wa.me/6285797574754?text=Hallo%20kak%20Admin,%20Aku%20Mau%20tau%20Informasi%20lebih%20lanjut%20tentang%20Ofor.site%20donk!" 
   class="wa-float-btn" 
   target="_blank" 
   rel="noopener noreferrer" 
   title="Chat Admin"
   aria-label="Chat WhatsApp Admin">
    <i class="bi bi-whatsapp"></i>
</a>