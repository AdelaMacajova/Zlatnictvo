<?php
    class Date {

        public function getDate() {
            $month=date("F"); //Mesiac ("F"ull názov)
            $day=date("d"); //"d"eň
            $hour=date("H"); //"H"odina
            $time=""; //Čas dňa (Ráno/Obed/Večer...) nižšie určený hodinou
            $suffix=""; //Koncovka pri čase (-st, -nd, -rd, -th)

            if($hour<12){
                $time="Morning";
            }elseif($hour<14){
                $time="Lunch";
            }elseif($hour<18){
                $time= "Afternoon";
            }else{
                $time="Evening";
            }

            if($day==1 || $day==21 || $day==31){
                $suffix="st";
            }elseif($day==2 || $day==22){
                $suffix="nd";
            }elseif($day==3 || $day==23){
                $suffix="rd";
            }else{
                $suffix="th";
            }

            echo($time . ", " . $day . $suffix . " of " . $month);
        }

        public function getCurrentYear() { //Pre Copyright na spodku stránky
            $year=date("Y");
            echo($year);
        }
    }
?>