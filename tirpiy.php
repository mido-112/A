<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Planner</title>
    <link rel="stylesheet" href="./h2.css">
    <script>
        function toggleDetails() {
            const detailsSection = document.getElementById("details-section");
            if (detailsSection.style.display === "none" || detailsSection.style.display === "") {
                detailsSection.style.display = "block";
            } else {
                detailsSection.style.display = "none";
            }
        }

        function submitForm(event) {
            event.preventDefault();
            const title = document.getElementById("title").value;
            const departureDate = document.getElementById("depart-date").value;
            const returnDate = document.getElementById("return-date").value;
            const people = document.getElementById("people").value;

            if (!title || !departureDate || !returnDate || !people) {
                alert("Please fill out all required fields.");
                return;
            }

            let travelDetails = `Travel Plan Created!\nTitle: ${title}\nDeparture Date: ${departureDate}\nReturn Date: ${returnDate}\nPeople: ${people}\n`;

            const destinations = document.querySelectorAll(".destination");
            destinations.forEach((destination, index) => {
                const destinationName = destination.querySelector(".destination-name").value;
                const transportation = destination.querySelector(".transportation").value;
                const departureAddress = destination.querySelector(".departure-address").value;
                const departureCost = destination.querySelector(".departure-cost").value;
                const accommodationCost = destination.querySelector(".accommodation-cost").value;
                const departureTime = destination.querySelector(".departure-time").value;

                travelDetails += `\nDestination ${index + 1}:\n- Destination Name: ${destinationName}\n- Transportation: ${transportation}\n- Departure Address: ${departureAddress}\n- Travel Cost: ¥${departureCost}\n- Accommodation Cost: ¥${accommodationCost}\n- Departure Time: ${departureTime}\n`;
            });

            alert(travelDetails);
        }

        function addTravelSegment() {
            const detailsSection = document.getElementById("details-section");

            // 새로운 목적지 및 관련 정보를 입력할 필드 추가
            const newSegment = document.createElement("div");
            newSegment.classList.add("travel-segment", "slide-down");

            newSegment.innerHTML = `
                <div class="form-group">
                    <label for="destination-name">Destination Name:</label>
                    <input type="text" class="destination-name" name="destination-name" required>
                </div>

                <div class="form-group">
                    <label for="transportation">Transportation:</label>
                    <input type="text" class="transportation" name="transportation" required>
                </div>

                <div class="form-group">
                    <label for="departure-address">Departure Address:</label>
                    <input type="text" class="departure-address" name="departure-address" required>
                </div>

                <div class="form-group">
                    <label for="departure-cost">Travel Cost (¥):</label>
                    <input type="number" class="departure-cost" name="departure-cost" min="0" step="1000" required>
                </div>

                <div class="form-group">
                    <label for="accommodation-cost">Accommodation Cost (¥):</label>
                    <input type="number" class="accommodation-cost" name="accommodation-cost" min="0" step="1000">
                </div>

                <div class="form-group">
                    <label for="departure-time">Departure Time:</label>
                    <input type="time" class="departure-time" name="departure-time" required>
                </div>
            `;

            detailsSection.insertBefore(newSegment, detailsSection.lastElementChild); // 버튼을 제외한 마지막 요소 앞에 삽입
        }
    </script>
</head>

<body>
    <h1>Tripiy</h1>
    <form onsubmit="submitForm(event)">
        <!-- 필수 필드 -->
        <div class="form-group">
            <label for="title">旅行名:</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="depart-date">出発日:</label>
            <input type="date" id="depart-date" name="depart-date" required>
        </div>

        <div class="form-group">
            <label for="return-date">到着日:</label>
            <input type="date" id="return-date" name="return-date" required>
        </div>

        <div class="form-group">
            <label for="people">人数:</label>
            <input type="number" id="people" name="people" min="1" required>
        </div>

        <!-- 자세히 보기 버튼 -->
        <button type="button" class="toggle-btn" onclick="toggleDetails()">View Details</button>

        <!-- 숨겨진 필드 (출발지 및 목적지 통합 필드) -->
        <div id="details-section" style="display: none;">
            <div class="travel-segment">
                <div class="form-group">
                    <label for="destination-name">プラン:</label>
                    <input type="text" class="destination-name" name="destination-name" required>
                </div>

                <div class="form-group">
                    <label for="transportation">目的地名:</label>
                    <input type="text" class="transportation" name="transportation" required>
                </div>

                <div class="form-group">
                    <label for="departure-address">住所:</label>
                    <input type="text" class="departure-address" name="departure-address" required>
                </div>

                <div class="form-group">
                    <label for="departure-cost">交通費 (¥):</label>
                    <input type="number" class="departure-cost" name="departure-cost" min="0" step="1000" required>
                </div>

                <div class="form-group">
                    <label for="accommodation-cost">ホテル代 (¥):</label>
                    <input type="number" class="accommodation-cost" name="accommodation-cost" min="0" step="1000">
                </div>

                <div class="form-group">
                    <label for="departure-time">出発時間:</label>
                    <input type="time" class="departure-time" name="departure-time" required>
                </div>
            </div>

            <!-- 플러스 버튼 -->
            <button type="button" class="add-btn" onclick="addTravelSegment()">+ Add Another Destination</button>
        </div>

        <!-- 제출 버튼 -->
        <button type="submit" class="search-btn">Create Plan</button>
    </form>
</body>

</html>
