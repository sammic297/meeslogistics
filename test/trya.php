
<script type="text/javascript">
	var nav = document.getElementById('access_nav'),
    body = document.body;

nav.addEventListener('click', function(e) {
    body.className = body.className? '' : 'with_nav';
    e.preventDefault();
});
</script>

<body id="body">

<p><a href="#main_nav" id="access_nav" class="access_aid">Skip to navigation</a></p>

<article>
    <!-- main content here -->
</article>

<nav id="main_nav">
    <ul>
        <li><a href="">Pricing</a></li>
        <li><a href="">About</a></li>
        <li><a href="">FAQ</a></li>
        <!-- etc. -->
    </ul>
    <p><a href="#body" id="access_top" class="access_aid">Skip to top</a></p>
</nav>

</body>

<style type="text/css">
	#main_nav {
    display: none;
}
.with_nav #main_nav {
    display: block;
}
#main_nav:target {
    display: block;
}
/* #main_nav {
    display: none;
    position: absolute;
    top: 0;
    left: 0;
    background: #fff;
}
.access_aid {
    display: block;
    position: relative;
    top: 0;
    right: 0;
    width: 40px;
    height: 0;
    padding-top: 40px;
    overflow: hidden;
    border: 1px solid #ccc;
}

.access_aid {
    /* In addition to the existing declarations... 
    background: white 10px 10px / 20px 20px no-repeat;
}

#access_nav {
    background-image: -webkit-repeating-linear-gradient(#ccc, #ccc 2px, #fff 2px, #fff 4px);
    background-image: repeating-linear-gradient(#ccc, #ccc 2px, #fff 2px, #fff 4px);
}

#access_top {
    background-image: linear-gradient(45deg, transparent 13px, #ccc 13px, #ccc 15px, transparent 0), linear-gradient(-45deg, white 13px, #ccc 13px, #ccc 15px, white 0);
} */
</style>