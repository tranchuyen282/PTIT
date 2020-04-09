  //ko cùng môn, cùng thứ-->tiết (ví dụ trùng nhau tiết 3)
        // và tổng số  tc<= số quy định(7-10)

        //đủ tín chỉ--> mới cho bấm nút đăng ký

        var count = 0; // số TC được chọn

        function dangKy() {


            var tongTC = document.getElementById("tongTC");

            tongTC.innerText = count;

            if (a.checked)
                count++;
            else
                count--;


        }

        function check(a) {
            var hpMoiCheck; //hpmới vừa chọn
            if (a.checked) {
                hpMoiCheck = a;
                console.log("hp mới check là" + hpMoiCheck.value);
                count++;
            } else
                count--;

            console.log(count);

           



            //tách các checkbox value đã chọn 
            var hocPhan = document.getElementsByClassName("hp"); // name="hp"

            var tcDaChon = new Array();
            var maTC = new Array(); // moi mon 1 tin chi ==>check trung mon hay ko
            var soTC = 0;
            thu = [];
            var tiet = [];
            var tcDangKyThanhCong = [];

            for (var i = 0; i < hocPhan.length; i++) {
                 if (hocPhan[i].checked) {
                    tcDaChon.push(hocPhan[i]);

                }
            }
            // hocPhan.forEach(function(element) {
            //     if (element.checked) {
            //         tcDaChon.push(element);
            //     }

            // }, this);


            tcDaChon.forEach(function(element) {

                var tc = element.value.split(",");
                soTC = soTC + parseInt(tc[3]);
                thu.push(tc[1]);
                tiet.push(tc[2]);
                maTC.push(tc[0]);
            }, this)


            console.log("soTC đã đăng ký là" + soTC);
            console.log("tc đã đăng ký" + maTC);

            //check các môn học : thứ, tiết, môn học
            // thứ tự các hàm : checkSoTC ==>checkMonHoc: nó sai :lỗi logic
            if (checkMonHoc(maTC) && checkTrungThuTiet(thu, tiet)) {

                // kiểm tra đã đăng ký đủ tín chỉ chưa, nếu đủ cho submit
                var dangKyButton = document.getElementById("dangKy");
                if (checkSoTC(soTC, 7, 10)) {
                    console.log("nut button" + dangKyButton);
                    dangKyButton.disabled = false;
                    // dangKyButton.removeAttribute("disabled");

                    alert("bạn đã có thể nhấn nút đăng ký để hoàn tất quá trình đăng ký");
                } else if (soTC > 10) {
                    dangKyButton.disabled = true;
                    alert("đã quá số lượng tín chỉ cho phép,vui lòng bỏ bớt");
                } else {
                    dangKyButton.disabled = true;
                }

            } else {
                console.log("môn này ko thể đăng ký");

                //bo mon hoc vua check
                var viTriVuaCheck;
                for (i = 0; i < tcDaChon.length; i++) {
                    if (tcDaChon[i] == hpMoiCheck) {
                        viTriVuaCheck = i;
                        console.log("vi tri vua check là" + viTriVuaCheck);
                    }
                }
                tcDaChon[viTriVuaCheck].checked = false;

                //nếu để hàm check số tín chỉ nằm ngoài if-->if này
                // soTC = soTC - tcDaChon[tcDaChon.length - 1].value.split(",")[1];

                //cập nhật lại số tín chỉ đã đăng ký
                soTC = soTC - parseInt(tcDaChon[viTriVuaCheck].value.split(",")[1]);


            }

            var tongTC = document.getElementById("tongTC");
            tongTC.innerText = soTC;
            console.log(tcDaChon);
        }

        function checkSoTC(soTC, soTCMin, soTCmax) {
            console.log("số tc đang check là" + soTC);
            if (soTC >= soTCMin && soTC <= soTCmax) {
                return true;
            } else {
                return false;
            }
        }

        function checkMonHoc(maTC) {
            var soMon = maTC.length;
            console.log("các môn đang check là" + maTC);
            for (i = 0; i < soMon; i++) {
                for (j = 0; j < soMon; j++) {
                    if (maTC[i] === maTC[j] && i != j) {
                        alert("trùng môn  đã đăng ký rùi bạn ơi");

                        return false;
                        break;
                    }
                }
            }
            return true;
        }

        function checkTrungThuTiet(thu, tiet) {
            var soMon = thu.length;

            console.log("đang check thứ tiết");
            for (i = 0; i < soMon; i++) {
                for (j = 0; j < soMon; j++) {
                    //trùng thứ --> check xem thử trùng tiết hay ko, nếu có lun, return false
                    if (thu[i] === thu[j] && i != j) {
                        var tietMonA = tiet[i].split("-");
                        var tietMonB = tiet[j].split("-");

                        console.log("hai tiết đang chek có trùng ko: " + tietMonA + tietMonB);

                        if (tietMonA[1] <= tietMonB[0] || tietMonB[0] <= tietMonA[1]) {
                            alert("trùng tiết của thứ " + thu[i] + " rùi bạn ơi");
                            return false;

                        }
                    }
                }
            }

            return true;

        }