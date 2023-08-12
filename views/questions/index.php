<?php
get_header();
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="row page-title align-items-center">
                    <div class="col-sm-4 col-xl-6">
                        <h4 class="mb-1 mt-0">All Questions</h4>
                    </div>
                    <div class="col-sm-8 col-xl-6 d-flex justify-content-end">
                        <a class="btn btn-primary btn-lg" href="#">Ask a question</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="row d-flex align-items-center">
                    <div class="col-12">
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-primary">Newest</button>
                            <button type="button" class="btn btn-outline-primary">Unanswered</button>
                            <button type="button" class="btn btn-outline-primary">Answered</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 mx-auto">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2><a href="#">Question Title</a></h2>
                        <div>
                            Question Description
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <div class="ms-4">
                                <a href="#">Ndzi Vera Vera</a>
                                <span class="text-muted mr-2">3 days ago</span>
                                <span>0 answers</span>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="d-flex justify-items-center justify-content-between">
                    <div class="d-flex justify-content-between flex-fill d-sm-none">
                        <ul class="pagination">

                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">« Previous</span>
                            </li>


                            <li class="page-item">
                                <a class="page-link" href="?page=2" rel="next">Next »</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div>
                            <ul class="pagination">

                                <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                    <span class="page-link" aria-hidden="true">‹</span>
                                </li>

                                <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                <li class="page-item"><a class="page-link" href="?page=2">2</a></li>


                                <li class="page-item">
                                    <a class="page-link" href="?page=2" rel="next" aria-label="Next »">›</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
<?php
get_footer();
