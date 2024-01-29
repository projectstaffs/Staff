<!DOCTYPE html>
<html>
<head>    
</head>
<body style="background: #FFF0D2;margin: 0;width: 100%;">    
    <div style="border-bottom: 0.5px solid #bfb4b4; background: linear-gradient(180deg, #1E1510 -110.59%, rgba(92, 69, 56, 0.00) 114.71%);">
        <div style="width: 500px;margin: 0 auto;padding-top: 20px;padding-bottom: 10px;">
            <div style="text-align: center;margin-bottom: 3px;color: #1E1510;font-family: Playfair Display;font-size: 20px;font-weight: 700;line-height: 120%;">
                Агенство домашнього сервісу
            </div>
            <div style="text-align: center;color: #1E1510;font-family: Roboto;font-size: 14px;font-weight: 300;line-height: 130%;">
                Тут вирішуються ваші побутові задачі
            </div>
        </div>        
    </div>

    <div style="width: 500px; margin: 0 auto;">
        <div style="margin-top: 35px;color: #000;text-align: center;font-family: Roboto;font-size: 20px;font-weight: 400;line-height: 130%;">
            Ласкаво просимо до HouseHub!  
        </div>
        <div style="margin: 35px 0;color: #000;font-family: Roboto;font-size: 18px;font-weight: 300;line-height: 130%; text-align: center;">
            Ми раді бачити Вас і хочемо подякувати Вам від імені всієї нашої компанії за те, що Ви вибрали нас.
            Ми віримо, що наш сайт допоможе Вам, якщо Ви знаходитесь в активному пошуку роботи у сфері домашнього сервісу або Ви — Представник бізнесу, який хоче вирішити питання, пов’язані з укомплектуванням  чи управлінням персоналом.
        </div>
    </div>

    <div style="background: #5C4538;">
        <div style="width: 500px; margin: 0 auto;padding-top: 20px;padding-bottom: 20px;">
            <div style="color: #FFF0D2;text-align: center;font-family: Roboto;font-size: 18px;font-weight: 400;line-height: 130%;">
                Для підтвердження Вашої електронної пошти, будь-ласка, натисніть на кнопку «Підтвердити реєстрацію»
            </div>
            <form style="margin-top: 25px;" action="{{ env('APP_URL') }}/api/test/" method="POST">
                <input type="hidden" name="email" value="{{ $email }}">
                <div style="width: 256px; margin: 0 auto;">
                    <button style="cursor: pointer;width: 236px;padding-top: 5px;padding-bottom: 5px;border-radius: 10px;background: #1E1510;color: #FFF0D2;text-align: center;font-family: Roboto;font-size: 16px;font-weight: 500;line-height: 130%;" type="submit">
                        Підтвердити реєстрацію
                    </button>
                </div>                
            </form>
        </div>
    </div>    

    <div style="width: 500px; margin: 0 auto; padding-top: 20px;color: #000;text-align: center;font-family: Roboto;font-size: 18px;font-weight: 300;line-height: 130%;">
        <div style="padding: 0 10px;">
            Це повідомлення відправлено Вам компанією HouseHub. Якщо ви не бажаєте більше отримувати листи від нас, Ви можете 
            <span style="font-weight: 400;cursor: pointer;border-bottom: 1px solid #000;">відписатись</span>
        </div>
        <div style="margin: 20px 30px;">
            Якщо у Вас виникли додаткові питання чи пропозиції, просимо Вас звертатися за безкоштовним телефоном
            (067) 256 89 89
        </div>
        <div style="margin-bottom: 35px;">
            З турботою про Вас, команда HouseHub!
        </div>
    </div>
    
    <div style="width: 100%;background: #1E1510;padding-top: 20px;padding-bottom: 20px;">
        <div style="text-align: center;color: #FFF0D2;text-align: center;font-family: Roboto;font-size: 10px;font-weight: 400;line-height: 150%;">
            © 2023 - HouseHub Agency. Всі права захищені.            
        </div>        
    </div>
</body>
</html>