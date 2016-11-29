<?php
$path = "http://" . $_SERVER['HTTP_HOST'];
?>
<footer>
    <!-- informations société, copyright, liens contexte juridique -->
    <div id="footer">
        <!-- <table id="footer" width="100%" cellspacing="0" cellpadding="0"> -->
        <table id="footer" width="100%">
            <tbody>
            <tr><td width="30%">&copy;HPPH Development</td>
                <td width="40%" align="center">confidentialité<br>
                    <a href="<?php echo $path;?>/newsletter/">inscription Newsletter</a></td>
                <td width="30%" align="right">cookies</td>
            </tr>
            </tbody>
        </table>
    </div>
</footer>