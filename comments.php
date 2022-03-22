<?php
    session_start();
    if(!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']){
            header("Location:login.php");
    }
?>
<div class="testimonials">
        <section role="main">
            <article id="testimonial-of-the-day">
                <header>
                    <h2 class="post-title">
                            What People are Saying...
                    </h2>
                </header>
            </article>
        </section>
    </div> 

    <div class="comment-box">
        <div class="dialogbox">
            <div class="body">
                <span class="tip tip-up"></span>
                <div class="message">
                    <span>This is where testimonials will go.</span>
                </div>
            </div>
        </div>
    </div>