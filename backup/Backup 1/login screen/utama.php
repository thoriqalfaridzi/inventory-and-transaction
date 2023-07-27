<!DOCTYPE html>
<html>
    <head>
        <title>Main Web</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header>
            <a href="#" class="logo">Logo</a>
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Work</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </header>
        <section>
            <img src="image/star.png" id="star">
            <img src="image/moon.png" id="moon">
            <h2 id="text">Gudang by Thoriq</h2>
            <a href="#sec" id="btnlogin">Login</a>
            <img src="image/gudangbg.png" id="gudangbg">
        </section>
        <div class="sec" id="sec">    
            <h2>Parallax</h2>
            <p>
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            <br><br>                        aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            <br><br>
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            <br><br>                        aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw.aspldpasldaspodjqwonieonqpwneuqwnpeqwnepunqwienqwneqwnqw. 
            <br><br>
            </p>

            
            
        </div>

        <script>
            let gudangbg = document.getElementById('gudangbg');

            window.addEventListener('scroll',function(){
                let value = window.scrollY;
                star.style.left = value * 0.2 + 'px';
                moon.style.top = value * 1.05 + 'px';
                text.style.marginTop = value * 3 + 'px';
                btnlogin.style.marginTop = value * 5 + 'px';
                header.style.top = value * 0.5 + 'px';
            })
        </script>
    </body>
</html>