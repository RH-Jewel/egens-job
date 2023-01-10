<?php


// $args = array(
//     'post_type' => 'post',
//     'post_status' => 'publish',
//     'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
// );
// $wp_query = new WP_Query($args);

// echo '<pre>';
// var_dump($wp_query);
// exit();

/**
 * For blog single page.
 */
if (is_single()) : ?>

    <article class="entry-content">
        <div class="col-12">
            <div class="post--meta text-center">
                22 dec, 2022 | Nyheter </div>
            <h1 class="text-center">Veckans medarbetare </h1>

            <div class="text-center primary-color-text-color d-flex justify-content-center align-items-center share-page">
                Dela sida <div class="icon-circle">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                        <i class="icon-facebook"></i>
                    </a>
                </div>
                <div class="icon-circle">
                    <a href="https://twitter.com/home?status=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                        <i class="icon-twitter"></i>
                    </a>
                </div>
                <div class="icon-circle">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                        <i class="icon-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 single-post__thumbnail">
            <img width="1400" height="600" src="https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/lamija-002veckans-e1671692112661-1400x600.jpg" class="attachment-single-post size-single-post wp-post-image" alt="" decoding="async">
        </div>

        <div class="col-12 col-md-9 mx-auto">
            <p><strong>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i söder. Veckans medarbetare är en person som agerar i enlighet med våra värderingar Passion och Execution.&nbsp;</strong></p>
            <p>Veckans Medarbetare heter Lamija Bazdarevic och arbetar som montör i Växjö.</p>
            <p><strong>Motiveringen till utmärkelsen lyder:</strong><br>
                ”Lamija har inte jobbat jättelänge på Uniflex men har redan gjort ett stort avtryck på arbetsplatsen hon arbetar på. Otroligt driven, engagerad och är en trevlig kollega! Tack Lamija för ditt fantastiska arbete, du är en mycket uppskattad kollega såväl hos vår kund som hos oss på Uniflex!”</p>
            <p><strong>Grattis till utmärkelsen som Veckans Medarbetare! Hur känns det att få denna utmärkelse?</strong><strong><br>
                </strong>Det känns jättebra, det känns som att jag är på rätt ställe.</p>
            <p><strong>Vad fick dig att söka jobb på Uniflex?</strong><strong><br>
                </strong>Blev rekommenderad av en kompis och ville testa på industrin.</p>
            <p><strong>Hur ser en arbetsdag ut för dig?&nbsp; </strong><br>
                Vi börjar med ett uppstartsmöte. Därefter börjar vi jobba på de olika produktionslinorna som finns.</p>
            <p><strong>Vad är det bästa med att jobba på Uniflex?<br>
                </strong>Förståelsen som Uniflex har, det fina samarbetet med personalen.</p>
            <p>&nbsp;</p>
            <p>Grattis till utmärkelsen Lamija och stort TACK för ditt arbete!</p>
            <div class="single-post__share-buttons">
                <div class="text-center primary-color-text-color d-flex justify-content-center align-items-center share-page">
                    Dela sida <div class="icon-circle">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                            <i class="icon-facebook"></i>
                        </a>
                    </div>
                    <div class="icon-circle">
                        <a href="https://twitter.com/home?status=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                            <i class="icon-twitter"></i>
                        </a>
                    </div>
                    <div class="icon-circle">
                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwww.uniflex.se%2Fnyheter%2Fveckans-medarbetare-244%2F" target="_blank">
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </article>

<?php endif;

/**
 * For blog index.
 */
if (!is_single()) : ?>


    <div class="col-12 col-xl-3">
        <div class="js-posts-filters">
            <div class="d-xl-none blog-posts-select">
                <div class="custom-select position-relative is-hidden entry-content"> <span class="active-li js-active-li"> <span class="js-current-office"> Alla kategorier </span> <i class="icon-arrow-down"></i> </span>
                    <ul>
                        <li> <a href="https://www-uniflex-se.translate.goog/uniflex-blogg/?_x_tr_sl=no&amp;_x_tr_tl=en&amp;_x_tr_hl=no&amp;_x_tr_pto=wapp#" data-term-id="null" class="is-active"> Alla kategorier </a> </li>
                        <li> <a href="https://www-uniflex-se.translate.goog/uniflex-blogg/?_x_tr_sl=no&amp;_x_tr_tl=en&amp;_x_tr_hl=no&amp;_x_tr_pto=wapp#" data-term-id="203" class="is-active"> Ansökningstips </a> </li>
                        <li> <a href="https://www-uniflex-se.translate.goog/uniflex-blogg/?_x_tr_sl=no&amp;_x_tr_tl=en&amp;_x_tr_hl=no&amp;_x_tr_pto=wapp#" data-term-id="199" class="is-active"> Bemanningsbranchen </a> </li>
                        <li> <a href="https://www-uniflex-se.translate.goog/uniflex-blogg/?_x_tr_sl=no&amp;_x_tr_tl=en&amp;_x_tr_hl=no&amp;_x_tr_pto=wapp#" data-term-id="200"> Jobba på Uniflex </a> </li>
                        <li> <a href="https://www-uniflex-se.translate.goog/uniflex-blogg/?_x_tr_sl=no&amp;_x_tr_tl=en&amp;_x_tr_hl=no&amp;_x_tr_pto=wapp#" data-term-id="1"> Nyheter </a> </li>
                        <li> <a href="https://www-uniflex-se.translate.goog/uniflex-blogg/?_x_tr_sl=no&amp;_x_tr_tl=en&amp;_x_tr_hl=no&amp;_x_tr_pto=wapp#" data-term-id="201"> Rekryteringstips </a> </li>
                        <li> <a href="https://www-uniflex-se.translate.goog/uniflex-blogg/?_x_tr_sl=no&amp;_x_tr_tl=en&amp;_x_tr_hl=no&amp;_x_tr_pto=wapp#" data-term-id="434"> Våra kontor </a> </li>
                        <li> <a href="https://www-uniflex-se.translate.goog/uniflex-blogg/?_x_tr_sl=no&amp;_x_tr_tl=en&amp;_x_tr_hl=no&amp;_x_tr_pto=wapp#" data-term-id="202"> Våra medarbetare </a> </li>
                    </ul>
                </div>
            </div>
            <div class="posts-filters d-none d-xl-block">
                <div> <span class="is-active" data-term-id="null">Alla kategorier</span>
                </div>
                <div> <span class="" data-term-id="203"> Ansökningstips </span>
                </div>
                <div> <span class="" data-term-id="199"> Bemanningsbranchen </span>
                </div>
                <div> <span class="" data-term-id="200"> Jobba på Uniflex </span>
                </div>
                <div> <span class="" data-term-id="1"> Nyheter </span>
                </div>
                <div> <span class="" data-term-id="201"> Rekryteringstips </span>
                </div>
                <div> <span class="" data-term-id="434"> Våra kontor </span>
                </div>
                <div> <span class="" data-term-id="202"> Våra medarbetare </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 js-ajax-posts posts-outer-container col-xl-9">
        <div class="js-spinner text-center d-none">
            <div class="spinner"></div>
        </div>
        <div class="row blog-post-list js-posts-container">
            <div class="col-12 col-sm-6">
                <div class="blog-post-list__item">
                    <div class="post--meta">
                        05 jan, 2023 • Nyheter </div>
                    <div class="entry-content">
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-245/">
                            <h3 class="black-text-color">Veckans medarbetare</h3>
                        </a>
                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i…</p>
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-245/" class="link--arrow">Läs mer</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">

                <div class="blog-post-list__item">
                    <img width="480" height="350" src="https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/lamija-002veckans-e1671692112661-480x350.jpg" class="attachment-blog-list size-blog-list wp-post-image" alt="" decoding="async" loading="lazy">
                    <div class="post--meta">
                        22 dec, 2022 • Nyheter </div>
                    <div class="entry-content">
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-244/">
                            <h3 class="black-text-color">Veckans medarbetare</h3>
                        </a>
                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i…</p>
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-244/" class="link--arrow">Läs mer</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">

                <div class="blog-post-list__item">
                    <img width="480" height="350" src="https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/veckans-v50-e1671115659396-480x350.jpg" class="attachment-blog-list size-blog-list wp-post-image" alt="" decoding="async" loading="lazy" srcset="https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/veckans-v50-e1671115659396-480x350.jpg 480w, https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/veckans-v50-e1671115659396-780x570.jpg 780w" sizes="(max-width: 480px) 100vw, 480px">
                    <div class="post--meta">
                        16 dec, 2022 • Nyheter </div>
                    <div class="entry-content">
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-243/">
                            <h3 class="black-text-color">Veckans medarbetare</h3>
                        </a>
                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i…</p>
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-243/" class="link--arrow">Läs mer</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">

                <div class="blog-post-list__item">
                    <img width="369" height="350" src="https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/veckansmedarbetare-v49-e1670585139214-369x350.jpg" class="attachment-blog-list size-blog-list wp-post-image" alt="" decoding="async" loading="lazy">
                    <div class="post--meta">
                        09 dec, 2022 • Nyheter </div>
                    <div class="entry-content">
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-242/">
                            <h3 class="black-text-color">Veckans medarbetare</h3>
                        </a>
                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i…</p>
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-242/" class="link--arrow">Läs mer</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">

                <div class="blog-post-list__item">
                    <img width="480" height="350" src="https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/12/veckansmedarbetare-v48-e1669970410628-480x350.jpg" class="attachment-blog-list size-blog-list wp-post-image" alt="" decoding="async" loading="lazy">
                    <div class="post--meta">
                        02 dec, 2022 • Nyheter </div>
                    <div class="entry-content">
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-241/">
                            <h3 class="black-text-color">Veckans medarbetare</h3>
                        </a>
                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i…</p>
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-241/" class="link--arrow">Läs mer</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">

                <div class="blog-post-list__item">
                    <img width="480" height="350" src="https://wwwuniflexse.cdn.triggerfish.cloud/uploads/2022/11/veckans-medarbetare-karlstad-e1669365682392-480x350.jpg" class="attachment-blog-list size-blog-list wp-post-image" alt="" decoding="async" loading="lazy">
                    <div class="post--meta">
                        25 nov, 2022 • Nyheter </div>
                    <div class="entry-content">
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-240/">
                            <h3 class="black-text-color">Veckans medarbetare!</h3>
                        </a>
                        <p>På Uniflex har vi över 3000 duktiga medarbetare på ett 40-tal olika orter, från Umeå i norr till Malmö i…</p>
                        <a href="https://www.uniflex.se/nyheter/veckans-medarbetare-240/" class="link--arrow">Läs mer</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row js-get-posts-container">
            <div class="col-12 text-center"> <button class="btn btn--black js-get-posts">Visa fler blogginlägg</button>
            </div>
        </div>
    </div>

<?php endif; ?>