<?php

$sx=array();$sy=array();$s=0;
$sx[$s]="bitfire.at";$sy[$s]="deependhulla.com";$s++;
$sx[$s]="at.bitfire.davdroid";$sy[$s]="com.deependhulla.davdroid";$s++;
$sx[$s]="DAVdroid";$sy[$s]="OpenSync";$s++;
$sx[$s]="com.deependhulla.davdroid";$sy[$s]="com.deependhulla.opensync";$s++;
#$sx[$s]="";$sy[$s]="";$s++;
#$sx[$s]="";$sy[$s]="";$s++;



$flist=array();
$flistx="";
$cmdx="find davdroid -type f -name *.xml";
$flistx=$flistx."\n".`$cmdx`;

$cmdx="find davdroid -type f -name *.java";
$flistx=$flistx."\n".`$cmdx`;

$cmdx="find davdroid -type f -name *.gradle";
$flistx=$flistx."\n".`$cmdx`;


#####
$flist=explode("\n",$flistx);

for($e=0;$e<sizeof($flist);$e++)
{
#######if($flist[$e] !="" && $flist[$e]=="davdroid/app/src/main/res/values/strings.xml")
if($flist[$e] !="")
{
print "\n $e --> ".$flist[$e];
$readdata=file_get_contents($flist[$e]);
$olddata=$readdata;
for($s=0;$s<sizeof($sx);$s++)
{
$readdata=str_replace($sx[$s],$sy[$s],$readdata);
}
if($olddata!=$readdata)
{
#print $readdata;
print " CHANGED \n";
$ssout=file_put_contents($flist[$e],$readdata);
}

}
}


print "\n";
$cmdx="mv davdroid/app/src/main/java/at/bitfire davdroid/app/src/main/java/at/deependhulla 2>/dev/null ; mv davdroid/app/src/main/java/at davdroid/app/src/main/java/com 2>/dev/null";
`$cmdx`;
$cmdx="cp -pRv opensync-icons/res/mipmap-* davdroid/app/src/main/res/ ; cp -pRv opensync-icons/web_hi_res_512.png davdroid/app/src/main/res/mipmap/ic_launcher.png ";
`$cmdx`;
print "\n";
?>
