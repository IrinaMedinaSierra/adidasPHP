<?php
session_abort();
include "header.php"
?>
    <form class="modal-content animate" action="controlador.php" method="post">
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Usuario" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Password" name="psw" required>

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

    </form>
</div>
</body>
</html>
