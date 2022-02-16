<object class="pdf-object-container" data="
    <?php
        $directory = "pdfcontent/*.pdf";
        $files = glob($directory);
        $randomInt = rand(1,count($files));
        print(@$files[$randomInt - 1]);
    ?>">
    Sorry, your browser isn't compatible with this pdf viewer.
</object>