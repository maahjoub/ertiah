let countSpan = document.querySelector(".quiz-app .count span")
let bulletsContainer = document.querySelector(".bullets .spans")
let quizArea = document.querySelector(".quiz-area")
let answerArea = document.querySelector(".answers-area")
let submitButton  = document.querySelector(".submit-button")
let bulet  = document.querySelector(".bullets")
let resultsContainer  = document.querySelector(".results")
let countdownEl  = document.querySelector(".countdown")
let curentIndex = 0, rightAnswers = 0, countDownInterval
function getQuestions() {
    let myRequest = new XMLHttpRequest();
    myRequest.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let questionsOpj = JSON.parse(this.responseText);
            x = Array.from(questionsOpj)

            let Qcouny = questionsOpj.length
            // function createPolets
            createPolets(Qcouny)
            // function addQdata
            addQdata(questionsOpj[curentIndex], Qcouny)
            // function countDown
            countDown(30, Qcouny)
            // function checkAnswers
            submitButton.onclick = () => {
                let therightAnswer = questionsOpj[curentIndex].right_answer

                curentIndex++
                // function checkAnswers
                checkAnswers(therightAnswer, Qcouny)
                quizArea.innerHTML = ''
                answerArea.innerHTML = ''
                addQdata(questionsOpj[curentIndex], Qcouny)
                // function handelBullets
                handelBullets()
                // function countDown
                clearInterval(countDownInterval)
                countDown(30, Qcouny)
                // function showResult
                showResult(Qcouny)
            }
        }
    };

    myRequest.open("GET", "{{ route('questions.show') }}" , true);
    myRequest.send();
}
getQuestions();

// start function createPolets
function createPolets(num) {
    countSpan.innerHTML = num
    for (let i =0; i<num; i++ ) {
        let theBulet = document.createElement("span")
        if (i=== 0) {
            theBulet.className = "on"
        }
        bulletsContainer.appendChild(theBulet)
    }
}
// end function createPolets

// start function addQdata
function addQdata (opj, count) {
    if (curentIndex < count) {
        let theTitle = document.createElement("h2")
        let qText = document.createTextNode(opj.qustion)
        quizArea.appendChild(qText)
        quizArea.appendChild(theTitle)
        /*********************************** */
        x = Array.from(opj.answer)

        for (let i = 0; i < 4; i++) {
            var myDiv = document.createElement("div")
            myDiv.className = "answers"
            var radioInput = document.createElement("input")
            radioInput.name = 'question'
            radioInput.type = 'radio'
            radioInput.id = `answers_${i}`

            radioInput.dataset.answer = x[i]["answer"]
            if (i === 0) {
                radioInput.checked = true
            }

            //console.log(x[i]["answer"])
            var theLable = document.createElement("label")
            theLable.htmlFor = `answers_${i}`
            labelText = document.createTextNode(x[i]["answer"])
            theLable.appendChild(labelText)
            myDiv.appendChild(radioInput)
            myDiv.appendChild(theLable)
            answerArea.appendChild(myDiv)

        }
    }


}
// end function addQdata

// start function checkAnswers
function checkAnswers(rAnswer, count) {
    let answers = document.getElementsByName("question")

    let chosenAnswer
    for (let i = 0; i < answers.length; i++) {
        if (answers[i].checked) {
            chosenAnswer = answers[i].dataset.answer
        }
    }
    if (rAnswer === chosenAnswer) {
        rightAnswers++
    }
}
// end function checkAnswers

function handelBullets () {
    let bulletsSpan = document.querySelectorAll(".bullets .spans span")
    let arrayOfSpans = Array.from(bulletsSpan)
    arrayOfSpans.forEach((span, index) => {
        if (curentIndex === index) {
            span.className = "on"
        }
    })
}

// end function showResult
function showResult(count) {
    let results
    if (curentIndex === count) {
        quizArea.remove()
        answerArea.remove()
        submitButton.remove()
        bulet.remove()

        if (rightAnswers > (count / 2) && rightAnswers < count) {
            results = ` <span class = "god" >GOOD</span> , ${rightAnswers} From ${count} is Good`
        } else if (rightAnswers === count ) {
            results = ` <span class = "perfect" >Perfect</span> , ${rightAnswers} From ${count} is Perfect`
        } else {
            results = ` <span class = "bad" >BAD</span> , ${rightAnswers} From ${count} is bad try again later`
        }
        resultsContainer.innerHTML = results
    }
}

// end function countdown
function countDown (duration, count) {
    if (curentIndex < count) {
        let minutes, seconds
        countDownInterval = setInterval( () =>{
            minutes = parseInt (duration / 60 )
            seconds = parseInt (duration % 60 )
            minutes = minutes < 10 ? `0${minutes}` : minutes
            seconds = seconds < 10 ? `0${seconds}` : seconds
            countdownEl.innerHTML =`${minutes}:${seconds}`
            if (--duration < 0) {
                clearInterval(countDownInterval)
                submitButton.click()
            }
        }, 1000)
    }
}
