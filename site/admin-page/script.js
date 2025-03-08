            // For responsive Side Bar
            const sidebar = document.getElementById("sidebar");
            const openBtn = document.getElementById("openSidebar");
            const closeBtn = document.getElementById("closeSidebar");

            function openSidebar() {
            document.getElementById("sidebar").style.display = "block";
            document.getElementById("openSidebar").style.display = "none";
            }

            function closeSidebar() {
            document.getElementById("sidebar").style.display = "none";
            document.getElementById("openSidebar").style.display = "block";
            }


            