<section id="property-rating">
    <header><h2>Puntaje</h2></header>
    <div class="clearfix">
        <aside>
            <header>Tu Puntaje</header>
            <div class="rating rating-user">
                <div class="inner"></div>
            </div>
        </aside>
        <figure>
            <header>Overall Rating</header>
            <div class="rating rating-overall" data-score="4"></div>
        </figure>
    </div>
    <div class="rating-form">
        <header>Thank you! Please describe your rating</header>
        <form role="form" id="form-rating" method="post"  class="clearfix">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form-rating-name">Your Name<em>*</em></label>
                        <input type="text" class="form-control" id="form-rating-name" name="form-rating-name" required>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form-rating-email">Your Email<em>*</em></label>
                        <input type="email" class="form-control" id="form-rating-email" name="form-rating-email" required>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form-rating-message">Your Message<em>*</em></label>
                        <textarea class="form-control" id="form-rating-message" rows="6" name="form-rating-message" required></textarea>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
            <div class="form-group">
                <button type="submit" class="btn pull-right btn-default" id="form-rating-submit">Send a Message</button>
            </div><!-- /.form-group -->
            <div id="form-rating-status"></div>
        </form><!-- /#form-contact -->
    </div><!-- /.rating-form -->
</section><!-- /#property-rating -->