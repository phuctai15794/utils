<div class="contact-group">
    <div class="icon ">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="button-action-group ">
        <a class="text-decoration-none" href="tel:<?= $func->parsePhone($optsetting['hotline']) ?>"><i class="fa fa-phone"></i><?= $func->formatPhone($optsetting['hotline']) ?></a>
        <a class="text-decoration-none" href="tel:<?= $func->parsePhone($optsetting['phone']) ?>"><i class="fa fa-phone"></i><?= $func->formatPhone($optsetting['phone']) ?></a>
    </div>
</div>

/* Multiphone */
NN_FRAMEWORK.MultiPhone = function () {
	if (isExist($('.contact-group'))) {
		$('.contact-group')
			.find('.icon')
			.on('click', function () {
				$(this).toggleClass('active');
				$(this).next('.button-action-group').toggleClass('active');
			});
	}
};

<!-- CSS -->
<style>
    .contact-group {
        position: fixed;
        z-index: 999999;
        left: 20px;
        bottom: 20px;

        .icon {
            width: 48px;
            height: 48px;
            background: rgba(243, 113, 33, 0.8);
            border-radius: 50%;
            position: relative;
            cursor: pointer;
        }
    }

    .btn-icon-facebook .icon-fb {
        width: 48px;
        height: 48px;
        background: rgba(243, 113, 33, 0.8);
        border-radius: 50%;
        position: relative;
        cursor: pointer;
    }

    .contact-group .icon:after,
    .btn-icon-facebook .icon-fb:after {
        content: "";
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: inherit;
        border-radius: inherit;
        -webkit-animation: pulse-animation 1s cubic-bezier(0.24, 0, 0.38, 1) infinite;
        animation: pulse-animation 1s cubic-bezier(0.24, 0, 0.38, 1) infinite;
        z-index: -1;
    }

    .contact-group .icon:before,
    .btn-icon-facebook .icon-fb:before {
        content: "";
        display: block;
        position: absolute;
        width: 60px;
        height: 60px;
        top: -7px;
        left: -7px;
        border: 1px solid rgba(243, 113, 33, 0.2);
        border-radius: inherit;
        -webkit-animation: pulse-animation 1.5s cubic-bezier(0.24, 0, 0.38, 1) infinite;
        animation: pulse-animation 1s cubic-bezier(0.24, 0, 0.38, 1) infinite;
        animation-delay: 0.5s;
        -webkit-animation-delay: 0.5s;
        z-index: -1;
        background: transparent;
        animation-fill-mode: forwards;
        -webkit-animation-fill-mode: forwards;
    }

    .contact-group .icon {
        span {
            width: 24px;
            height: 1px;
            background: #fff;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            transition: all 240ms linear;
        }

        &.active span {
            &:first-child {
                transform: rotate(45deg);
                top: 24px;
                left: 13px;
            }

            &:nth-of-type(2) {
                transform: scale(0);
            }

            &:nth-of-type(3) {
                transform: rotate(-45deg);
                top: 24px;
                left: 13px;
            }
        }

        span {
            &:first-child {
                top: 17px;
            }

            &:nth-of-type(2) {
                top: 24px;
            }

            &:nth-of-type(3) {
                top: 31px;
            }
        }
    }

    .btn-icon-facebook {
        display: block;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 99999;
        cursor: pointer;
    }

    .contact-group .button-action-group {
        position: absolute;
        right: -160px;
        top: -120px;
        min-width: 210px;

        &:not(.active) a {
            display: none;
        }

        a {
            display: block;
            opacity: 0;
            padding: 5px 10px;
            background: rgba(243, 113, 33, 0.9);
            margin-bottom: 15px;
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            border-radius: 30px;
            letter-spacing: 1px;
            -webkit-animation: fadeup 1s cubic-bezier(0.24, 0, 0.38, 1);
            animation: fadeup 1s cubic-bezier(0.24, 0, 0.38, 1);
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;

            +a {
                animation-delay: 0.5s;
                -webkit-animation-delay: 0.5s;
            }

            i {
                width: 48px;
                height: 48px;
                background: #f37121;
                line-height: 48px;
                text-align: center;
                border-radius: 50%;
                margin: -10px 10px -10px -10px;
                box-shadow: 2px 0 7px -2px #00000078;
                position: relative;

                &:after {
                    content: "";
                    position: absolute;
                    width: 40px;
                    height: 40px;
                    left: 3px;
                    top: 3px;
                    border-radius: 50%;
                    border-width: 1px;
                    border-left-color: #f1f1f1;
                    border-style: solid;
                    border-right-color: #f1f1f1;
                    border-top-color: transparent;
                    border-bottom-color: transparent;
                    -webkit-animation: rotate 1s cubic-bezier(0.24, 0, 0.38, 1) infinite;
                    animation: rotate 1s cubic-bezier(0.24, 0, 0.38, 1) infinite;
                }
            }
        }
    }
</style>