<html>
    <head>
    <style>
            @page  {
                margin: 0cm 0cm;
                size: A4;
            }
            body {
                margin-top: 3cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 4cm;
            }
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
            }
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 4cm;
            }
        </style>
    </head>
    <body>
        <header>
            <img src="<?php echo e(asset('image/hrletter/header.jpeg')); ?>" width="100%">
        </header>
        <footer>
            <img src="<?php echo e(asset('image/hrletter/footer.png')); ?>" width="100%">
        </footer>
        <main>
            <?php echo $datas['description']; ?>

        </main>
    </body>
</html>