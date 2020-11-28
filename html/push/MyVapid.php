<?php
use SKien\PNServer\PNVapid;

function getMyVapid()
{
    /**
	 * set the generated VAPID key and rename to MyVapid.php
	 *
	 * you can generate your own VAPID key on https://tools.reactpwa.com/vapid.
	 */
     $oVapid = new PNVapid(
     "mailto:curtbraz@gmail.com",
     "BLCn4Y00pgJc73iH3io5pdKJ0Oqch0-6lCi_GkvZ5TZ7-PSk4SWvXsav7uG0jA-dSfjXMSZmo9xMYV0RoCHYPy8",
     "0WY3fuve8CfdMG6bULk2OSF1R3LB_lvxq3NL1JbueCQ"
     );
    return $oVapid;    
}