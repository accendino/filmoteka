<!-- если $resultSuccess не равен пустой строке, то выводим сообщение о резульате -->
<?php if ( @$resultSuccess != '' ) { ?> 
	<div class="info-success"><?=$resultSuccess?></div>
<?php } ?>

<!-- если $resultInfo не равен пустой строке, то выводим сообщение о резульате -->
<?php if ( @$resultInfo != '' ) { ?> 
	<div class="info-notification"><?=$resultInfo?></div>
<?php } ?>

<!-- если $resultError не равен пустой строке, то выводим сообщение о резульате -->
<?php if ( @$resultError != '' ) { ?> 
	<div class="error"><?=$resultError?></div>
<?php } ?>