<?php require_once 'header.php'; ?>
<div class="highlight-posts">
        <section role="main">
            <article id="post-of-the-day">
                <header>
                    <h1 class="post-title">
                        <a title="Song of the Day">
                            Sheet Music
                        </a>
                    </h1>
                </header>
            </article>
        </section>
    </div>
<div class="learn-wrapper">
    <?php
        $directory = "pdfcontent/*.pdf";
        $files = glob($directory);
        $i=0;
        foreach($files as $file){?>
            <div class="file" id="<?php $i;?>"> 
                <iframe class="pdf-learn-object-container" src="
                    <?php print($file);?>">
                    Sorry, your browser isn't compatible with this pdf viewer.
                </iframe>
            </div>
        <?php $i++;} ?>
</div>

<?php require_once 'footer.php'; ?>