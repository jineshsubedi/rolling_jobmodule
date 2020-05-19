<!-- header -->
<div style="background:#00B457; width:100%; border-radius:0 0 20px 20px; border-bottom:10px solid red; display: flex; margin: 0 auto;">
    <div style="margin: 0 auto; width: 50%">
       <img src="<?php echo e(asset('image/'.$data['logo'])); ?>" style="width: 100%;">
    </div>
</div>
<!-- body -->
<div style="height:auto; overflow: hidden; background:#f5f5f5; width:100%;">
    
    <div style="width:50%; float: left; text-align: justify; font-family: Arial; font-size: 12px;">
         <?php echo e($data['comment']); ?>


         <b><u>Attachment</u></b><br>
         <a href="<?php echo e(url('image/').$data['letter']); ?>"><img src="<?php echo e(asset('image/pdf_icon.png')); ?>" width="50px"></a>
    </div>
</div>

<!-- footer -->
<div style="background:#00B457">
    <div style="display: block; margin: 0 auto; width: 15%">
        <img src="<?php echo e(asset('image/'.$data['logo'])); ?>" style="width: 100%;">
    </div>
        <p style="text-align: center; color: #fff; margin:0; padding-top:0px; padding-bottom: 5px; font-family: Arial;">Email: <a href="mailto:<?php echo e($data['company_mail']); ?>" style="color: #fff; "><?php echo e($data['company_mail']); ?> </a> / Tel: <a href="tel:<?php echo e($data['telephone']); ?>" style="color: #fff; "><?php echo e($data['telephone']); ?> </a></p>
</div>