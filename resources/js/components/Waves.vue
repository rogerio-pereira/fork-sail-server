<template>
    <div class="wave-wrapper">
        <!-- BACK WAVE: 3 layers -->
        <svg
            class="back-wave"
            viewBox="0 0 1440 400"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
        >
            <defs>
                <linearGradient id="backGradient1" x1="47%" y1="0%" x2="53%" y2="100%">
                <stop offset="5%" stop-color="#E0F7FA"></stop>
                <stop offset="95%" stop-color="#4ACBDB"></stop>
                </linearGradient>
            </defs>

            <path
                fill="url(#backGradient1)"
                fill-opacity="0.6"
                d="M0,400 L0,200 C 360,100 1080,300 1440,200 L1440,400 Z"
            >
                <animate
                attributeName="d"
                dur="5s"
                repeatCount="indefinite"
                values="
                    M0,400 L0,200 C 360,100 1080,300 1440,200 L1440,400 Z;
                    M0,400 L0,220 C 400,150 1000,250 1440,220 L1440,400 Z;
                    M0,400 L0,210 C 300,120 1100,280 1440,210 L1440,400 Z;
                    M0,400 L0,200 C 360,100 1080,300 1440,200 L1440,400 Z
                "
                />
            </path>

            <path
                fill="url(#backGradient1)"
                fill-opacity="0.4"
                d="M0,400 L0,230 C 400,130 1040,330 1440,230 L1440,400 Z"
            >
                <animate
                attributeName="d"
                dur="5s"
                repeatCount="indefinite"
                values="
                    M0,400 L0,230 C 400,130 1040,330 1440,230 L1440,400 Z;
                    M0,400 L0,240 C 420,160 1020,310 1440,240 L1440,400 Z;
                    M0,400 L0,220 C 380,140 1080,320 1440,220 L1440,400 Z;
                    M0,400 L0,230 C 400,130 1040,330 1440,230 L1440,400 Z
                "
                />
            </path>

            <path
                fill="url(#backGradient1)"
                fill-opacity="0.3"
                d="M0,400 L0,260 C 420,160 1020,310 1440,260 L1440,400 Z"
            >
                <animate
                attributeName="d"
                dur="5s"
                repeatCount="indefinite"
                values="
                    M0,400 L0,260 C 420,160 1020,310 1440,260 L1440,400 Z;
                    M0,400 L0,270 C 450,180 990,290 1440,270 L1440,400 Z;
                    M0,400 L0,250 C 400,170 1060,300 1440,250 L1440,400 Z;
                    M0,400 L0,260 C 420,160 1020,310 1440,260 L1440,400 Z
                "
                />
            </path>
        </svg>

        <!-- MASCOT -->
        <img src="@/assets/sailor.png" class="mascot d-none d-lg-block" alt="Laravel Sailor Mascot" />

        <!-- FRONT WAVE: 3 layers -->
        <svg
            class="front-wave"
            viewBox="0 0 1440 400"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
        >
            <defs>
                <linearGradient id="frontGradient1" x1="47%" y1="0%" x2="53%" y2="100%">
                <stop offset="5%" stop-color="#01579B"></stop>
                <stop offset="95%" stop-color="#0288D1"></stop>
                </linearGradient>
            </defs>

            <path
                fill="url(#frontGradient1)"
                fill-opacity="0.7"
                d="M0,400 L0,250 C 360,200 1080,300 1440,250 L1440,400 Z"
            >
                <animate
                attributeName="d"
                dur="5s"
                repeatCount="indefinite"
                values="
                    M0,400 L0,250 C 360,200 1080,300 1440,250 L1440,400 Z;
                    M0,400 L0,270 C 400,230 1000,320 1440,270 L1440,400 Z;
                    M0,400 L0,260 C 300,210 1100,290 1440,260 L1440,400 Z;
                    M0,400 L0,250 C 360,200 1080,300 1440,250 L1440,400 Z
                "
                />
            </path>

            <path
                fill="url(#frontGradient1)"
                fill-opacity="0.5"
                d="M0,400 L0,280 C 400,230 1040,330 1440,280 L1440,400 Z"
            >
                <animate
                attributeName="d"
                dur="5s"
                repeatCount="indefinite"
                values="
                    M0,400 L0,280 C 400,230 1040,330 1440,280 L1440,400 Z;
                    M0,400 L0,290 C 420,250 1020,310 1440,290 L1440,400 Z;
                    M0,400 L0,270 C 380,240 1080,320 1440,270 L1440,400 Z;
                    M0,400 L0,280 C 400,230 1040,330 1440,280 L1440,400 Z
                "
                />
            </path>

            <path
                fill="url(#frontGradient1)"
                fill-opacity="0.3"
                d="M0,400 L0,310 C 420,260 1020,360 1440,310 L1440,400 Z"
            >
                <animate
                attributeName="d"
                dur="5s"
                repeatCount="indefinite"
                values="
                    M0,400 L0,310 C 420,260 1020,360 1440,310 L1440,400 Z;
                    M0,400 L0,320 C 450,280 990,340 1440,320 L1440,400 Z;
                    M0,400 L0,300 C 400,270 1060,350 1440,300 L1440,400 Z;
                    M0,400 L0,310 C 420,260 1020,360 1440,310 L1440,400 Z
                "
                />
            </path>
        </svg>
    </div>
</template>

<style scoped>
.wave-wrapper {
  position: relative;
  width: 100%;
  height: 200px;
  margin-top: -150px; /* Pulls the waves up */
}

/* BACK WAVE */
.back-wave {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
}

/* FRONT WAVE */
.front-wave {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 3;
}

/* MASCOT */
.mascot {
  position: absolute;
  bottom: -50px;
  left: 30px;
  height: 500px;
  z-index: 2;
  animation: mascotFloat 5s ease-in-out infinite;
}

@keyframes mascotFloat {
    0% { 
        transform: translateY(0); 
        rotate: 0deg;
    }
    50% { 
        transform: translateY(-8px); 
        rotate: 12deg;
    }
    100% { 
        transform: translateY(0); 
        rotate: 0deg;
    }
}

/* Extra small devices (phones, less than 600px) */
@media (max-width: 599px) {
    /* your adjustments */
}

/* Small devices (portrait tablets, 600px and up) */
@media (min-width: 600px) and (max-width: 959px) {
    /* your adjustments */
}

/* Medium devices (landscape tablets, 960px and up) */
@media (min-width: 960px) and (max-width: 1279px) {
    /* your adjustments */
}
</style>
