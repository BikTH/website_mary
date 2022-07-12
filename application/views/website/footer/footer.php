        <?php
            $currentLang = ( array_key_exists("lang", $_SESSION) && $_SESSION['lang'] ) ? $_SESSION['lang'] : $self->defaultLanguage;
        ?> 








        <!--END LINKS-->

        <div class="cookie-alert-footer" id="cookiefooter">
            <div class="container text-center">
                <div class="font-14">
                    <div class="py-2">This website stores cookies on your computer. These cookies are used to collect information about how you interact with our website and allow us to improve our service. To find out more about the cookies we use, read our <a class="a text-white" href="/about/legal/privacy-policy">Privacy Policy</a></div>
                    <div><a href="#" class="btn btn-light" data-action="dismiss">I understand, dismiss</a></div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="<?=assets("js/confirm.min.js");?>"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script type="application/javascript" src="<?=assets("js/core/website.js")."?".time();?>"></script>
    </body>
</html>