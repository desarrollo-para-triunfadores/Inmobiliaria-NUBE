<section id="form">
    <header><h3>Haganos llegar su mensaje</h3></header>
    <form role="form" action="/mail" id="form-contact" method="POST"  class="clearfix">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form-contact-name">Tu Nombre<em>*</em></label>
                    <input type="text" class="form-control" id="form-contact-name" name="name" required>
                </div><!-- /.form-group -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form-contact-email">Tu Email<em>*</em></label>
                    <input type="email" class="form-control" id="form-contact-email" name="email" required>
                </div><!-- /.form-group -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form-contact-message">Tu mensaje<em>*</em></label>
                    <textarea class="form-control" id="form-contact-message" rows="8" name="mensaje" required></textarea>
                </div><!-- /.form-group -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        <div class="form-group clearfix">
            <button type="submit" class="btn pull-right btn-default" id="form-contact-submit">Enviar Mensaje</button>
        </div><!-- /.form-group -->
        <div id="form-status"></div>
    </form><!-- /#form-contact -->
</section>