<?php
output_header("Download");
output_block_start("");
?>
<h1>Download</h1>
<ul>
<li><a href="/game/VexillumInstall_min.exe">Installer (without .NET Framework - 6.65MB)</a></li>
<li><a href="/game/VexillumInstall.exe">Installer (with .NET Framework - 55.3MB)</a></li>
<li><a href="/game/Vexillum.zip">.zip file (you will need to install the .NET Framework 4 and XNA Framework 4 separately - 0.3MB)</a></li>
</ul>
<p>The .NET Framework is already installed for most people, so try the first link.</p>
<h1>Troubleshooting</h1>
<p>
If the updater does not work, install the <a href="http://www.microsoft.com/en-us/download/details.aspx?id=17851">.NET Framework</a> and try again. If you see the updating window but the game doesn't launch successfully, install <a href="http://www.microsoft.com/en-us/download/details.aspx?id=20914">XNA</a> and try again. (the second link above should take care of both of these for you)
</p>
<p>If the game worked in the past but not anymore, delete the folder %appdata%\Vexillum\bin. To do this, go to Start&gt;Run, type %appdata% and press enter, then find the Vexillum folder, open it and delete the bin folder.</p>
 <?php
 output_block_end("");
output_footer();
?>