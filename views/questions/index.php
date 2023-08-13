<?php

namespace wp_questions;

use KMRoute;

get_header();
$current_page = sanitize_text_field( $_GET['page'] ?? 1 );
$questions    = Question::paginate( 2, $current_page )->orderBy( 'id', 'desc' )->get();
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="row page-title align-items-center">
                    <div class="col-sm-4 col-xl-6">
                        <h4 class="mb-1 mt-0">All Questions</h4>
                    </div>
                    <div class="col-sm-8 col-xl-6 d-flex justify-content-end">
                        <a class="btn btn-primary btn-lg" href="<?php echo KMRoute::route( 'questions.create' ) ?>">Ask
                            a
                            question</a>
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
				<?php foreach ( $questions['data'] as $question ): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2><a href="<?php echo KMRoute::route( 'questions.view', [ 'slug' => $question->slug ] ) ?>"><?php echo $question->title ?></a></h2>
                            <div>
								<?php echo $question->content ?>
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                                <div class="ms-4">
                                    <a href="#"><?php echo $question->user()->display_name ?></a>
                                    <span class="text-muted mr-2"><?php echo date( 'Y-m-d', $question->created_at ) ?></span>
                                    <span><?php echo count( $question->answers() ); ?> answers</span>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
                <nav class="d-flex justify-items-center justify-content-between">
                    <div>
                        <div>
                            <ul class="pagination">
								<?php if ( $current_page > 1 ): ?>
                                    <li class="page-item" aria-disabled="true" aria-label="« Previous">
                                        <a class="page-link" aria-hidden="true" rel="prev"
                                           aria-label="Prev »"
                                           href="?page=<?php echo $current_page - 1 ?>">‹</a>
                                    </li>
								<?php endif; ?>
								<?php for ( $i = 1; $i <= $questions['totalPages']; $i ++ ): ?>
									<?php if ( $i == $current_page ): ?>
                                        <li class="page-item active" aria-current="page"><span
                                                    class="page-link"><?php echo $i ?></span></li>
									<?php else: ?>
                                        <li class="page-item"><a class="page-link"
                                                                 href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
									<?php endif; ?>

								<?php endfor; ?>
								<?php if ( $questions['totalPages'] > 1 && $current_page != $questions['totalPages'] ): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $current_page + 1 ?>" rel="next"
                                           aria-label="Next »">›</a>
                                    </li>
								<?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
	<?php
get_footer();
