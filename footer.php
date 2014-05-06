</div> <!-- fine col-ms-3 -->
<div class="col-sm-2"> <?php get_sidebar('right'); ?> </div>
</div> <!-- chiudo row -->

<!-- Inizio Footer -->
<div class="row">
    <div class="col-sm-12">
        <footer>
            <?php if (!dynamic_sidebar('area-footer')) : ?>
                <p>Contenuto Footer</p>
            <?php endif; ?>
        </footer>
    </div>
</div>
<!-- Fine Footer -->

</div> <!-- /#container -->
</body>
</html>

