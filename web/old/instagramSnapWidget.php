<?php
// snapwidget.com hashtags
// ---- random local 
$a = array(
	1 => "<p>#prescottcollege</p><iframe src=\"http://snapwidget.com/sl/?h=cHJlc2NvdHRjb2xsZWdlfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                2 => "<p>#prescottaz</p><iframe src=\"http://snapwidget.com/sl/?h=cHJlc2NvdHRhenxpbnwxMjV8MnwzfHxub3w1fG5vbmU=\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                3 => "<p>#campverde</p><iframe src=\"http://snapwidget.com/sl/?h=Y2FtcHZlcmRlfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                4 => "<p>#verdevalley</p><iframe src=\"http://snapwidget.com/sl/?h=dmVyZGV2YWxsZXl8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                5 => "<p>#sedona</p><iframe src=\"http://snapwidget.com/sl/?h=c2Vkb25hfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                6 => "<p>#jeromeaz</p><iframe src=\"http://snapwidget.com/sl/?h=amVyb21lYXp8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
);
// -- random pop
//$b = array(
	//1 => "<p>#popmusic</p><iframe src=\"http://snapwidget.com/sl/?h=cG9wbXVzaWN8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                //2 => ""
//);
// generate random
$randA = mt_rand(1,6);
//$randB = mt_rand(1,2);
$display_blockA = $a[$randA];
//$display_blockB = $b[$randB];
$display_blockB = "<p>#popmusic</p><iframe src=\"http://snapwidget.com/sl/?h=cG9wbXVzaWN8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>";

return array($display_blockA, $display_blockB);
?>