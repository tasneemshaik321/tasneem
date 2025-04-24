
document.addEventListener("DOMContentLoaded", function () {
    // Get all FAQ questions
    const questions = document.querySelectorAll(".faq-question");

    questions.forEach(question => {
        question.addEventListener("click", function () {
            // Close all open answers first
            document.querySelectorAll(".faq-answer").forEach(answer => {
                if (answer !== this.nextElementSibling) {
                    answer.style.display = "none";
                }
            });

            // Toggle the clicked question's answer
            let answer = this.nextElementSibling;
            answer.style.display = answer.style.display === "block" ? "none" : "block";
        });
    });
});

// Search function for FAQs
function searchFAQs() {
    let input = document.getElementById("search").value.toLowerCase();
    let faqs = document.querySelectorAll(".faq");

    faqs.forEach(faq => {
        let questionText = faq.querySelector(".faq-question").innerText.toLowerCase();
        let answerText = faq.querySelector(".faq-answer p").innerText.toLowerCase();

        if (questionText.includes(input) || answerText.includes(input)) {
            faq.style.display = "block";
        } else {
            faq.style.display = "none";
        }
    });
}



