<?php

/**
 * 
 * Partial Name: loader
 * 
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>

<loader-spinner id="loader-partial-ff7580" class="loader-partial-ff7580">
    <span class="loader"></span>
</loader-spinner>

<style>
    #loader-partial-ff7580 {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        inset: 0;
        z-index: 10;
        background-color: #ffffff;
    }

    .dark-theme #loader-partial-ff7580 {
        background-color: #000000;
    }

    #loader-partial-ff7580.off {
        display: none;
    }

    .loader {
        position: relative;
        width: 48px;
        height: 48px;
        background: #de3500;
        transform: rotateX(65deg) rotate(45deg);
        color: #000000;
        animation: layers1 1s linear infinite alternate;
    }

    .dark-theme .loader {
        color: #ffffff;
    }

    .loader:after {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.7);
        animation: layerTr 1s linear infinite alternate;
    }

    .dark-theme .loader:after {
        background: rgba(255, 255, 255, 0.7);
    }

    @keyframes layers1 {
        0% {
            box-shadow: 0px 0px 0 0px
        }

        90%,
        100% {
            box-shadow: 20px 20px 0 -4px
        }
    }

    @keyframes layerTr {
        0% {
            transform: translate(0, 0) scale(1)
        }

        100% {
            transform: translate(-25px, -25px) scale(1)
        }
    }
</style>