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
});