<?php
print $time
  ? t('@time ago by !author', 
    array
      (
      '@time'   => $time,
      '!author' => $author,
      )
    ) 
  : t('n/a'); 
 