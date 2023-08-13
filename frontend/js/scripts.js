jQuery(document).ready(function ($) {
    $("#new-question-form").submit((e) => {
        e.preventDefault();
        const submitBtn = $('#submit-question');
        if (confirm("Are you sure you want to submit this question?")) {
            const form = $(this);
            const formData = new FormData();
            formData.append('title', form.find('input[name="title"]').val());
            formData.append('content', form.find('textarea[name="content"]').val());
            formData.append('action', 'wpq_create_question');

            submitBtn.hide();
            jQuery.ajax({
                type: "POST",
                contentType: false,
                processData: false,
                url: wp_questions_ajax_object.ajax_url,
                data: formData,
                success: function (response) {
                    submitBtn.show()
                    if (response.success) {
                        alert("Your question has been created");
                        window.location.href = wp_questions_ajax_object.site_url + '/questions';
                    } else {
                        alert(response.data);
                    }
                },
                error: function (e) {
                    submitBtn.show();
                    console.log(e)
                    alert("We could not save your question. Please try again.");
                }
            });
        }
    })

    $("#new-answer-form").submit((e) => {
        e.preventDefault();
        const submitBtn = $('#submit-answer');
        if (confirm("Are you sure you want to submit this answer?")) {
            const form = $(this);
            const formData = new FormData();
            formData.append('question_id', form.find('input[name="question_id"]').val());
            formData.append('content', form.find('textarea[name="content"]').val());
            formData.append('action', 'wpq_create_answer');

            submitBtn.hide();
            jQuery.ajax({
                type: "POST",
                contentType: false,
                processData: false,
                url: wp_questions_ajax_object.ajax_url,
                data: formData,
                success: function (response) {
                    submitBtn.show()
                    if (response.success) {
                        alert("Your answer has been submitted");
                        window.location.reload();
                    } else {
                        alert(response.data);
                    }
                },
                error: function (e) {
                    submitBtn.show();
                    console.log(e)
                    alert("We could not submit your answer. Please try again.");
                }
            });
        }
    })

    $("#update-question-form").submit((e) => {
        e.preventDefault();
        const submitBtn = $('#update-question');
        if (confirm("Are you sure you want to update this question?")) {
            const form = $(this);
            const formData = new FormData();
            formData.append('question_id', form.find('input[name="question_id"]').val());
            formData.append('title', form.find('input[name="title"]').val());
            formData.append('content', form.find('textarea[name="content"]').val());
            formData.append('action', 'wpq_update_question');

            submitBtn.hide();
            jQuery.ajax({
                type: "POST",
                contentType: false,
                processData: false,
                url: wp_questions_ajax_object.ajax_url,
                data: formData,
                success: function (response) {
                    submitBtn.show()
                    if (response.success) {
                        alert("Your question has been updated");
                        window.location.href = wp_questions_ajax_object.site_url + '/questions/' + response.data.slug;
                    } else {
                        alert(response.data);
                    }
                },
                error: function (e) {
                    submitBtn.show();
                    console.log(e)
                    alert("We could not save your question. Please try again.");
                }
            });
        }
    })
});