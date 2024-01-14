<!DOCTYPE html>
<html>
<head>    
</head>
<body style="background: #FFF0D2;margin: 0;width: 612px;">    
    <div style="height: 85px; border-bottom: 0.5px solid #bfb4b4; background: linear-gradient(180deg, #1E1510 -110.59%, rgba(92, 69, 56, 0.00) 114.71%);">
        <div style="width: 500px;margin: 0 auto;padding-top: 20px;">
            <div style="text-align: center;margin-bottom: 3px;color: #1E1510;font-family: Playfair Display;font-size: 20px;font-weight: 700;line-height: 120%;">
                Home service agency
            </div>
            <div style="text-align: center;color: #1E1510;font-family: Roboto;font-size: 14px;font-weight: 300;line-height: 130%;">
                Your everyday tasks are solved here
            </div>
        </div>        
    </div>

    <div style="width: 500px; margin: 0 auto;">
        <div style="margin-top: 35px;color: #000;text-align: center;font-family: Roboto;font-size: 20px;font-weight: 400;line-height: 130%;">
            Welcome to HouseHub!  
        </div>
        <div style="margin: 35px 0;color: #000;font-family: Roboto;font-size: 18px;font-weight: 300;line-height: 130%; text-align: center;">
            We are glad to see you and would like to thank you on behalf of our entire company for choosing us.
            We believe that our site will help you if you are actively looking for a job in the field of home services or you are a business representative who wants to solve issues related to staffing or personnel management.
        </div>
    </div>

    <div style="height: 176px;background: #5C4538;">
        <div style="width: 500px; margin: 0 auto;padding-top: 37px;">
            <div style="color: #FFF0D2;text-align: center;font-family: Roboto;font-size: 18px;font-weight: 400;line-height: 130%;">
                To confirm your email address, please click on the "Confirm registration" button
            </div>
            <form style="margin-top: 25px;" action="http://localhost/api/test/" method="POST">
                <input type="hidden" name="email" value="{{ $email }}">
                <div style="width: 256px; margin: 0 auto;">
                    <button style="cursor: pointer;width: 236px;height: 32px;border-radius: 10px;background: #1E1510;color: #FFF0D2;text-align: center;font-family: Roboto;font-size: 16px;font-weight: 500;line-height: 130%;" type="submit">
                        Confirm registration
                    </button>
                </div>                
            </form>
        </div>
    </div>    

    <div style="width: 500px; margin: 0 auto; padding-top: 20px;color: #000;text-align: center;font-family: Roboto;font-size: 18px;font-weight: 300;line-height: 130%;">
        <div style="padding: 0 10px;">
            This message was sent to you by HouseHub. If you do not want to receive any more emails from us, you can 
            <span style="font-weight: 400;cursor: pointer;border-bottom: 1px solid #000;">unsubscribe</span>
        </div>
        <div style="margin: 20px 30px;">
            If you have any additional questions or suggestions, please do not hesitate to call us toll-free
            (067) 256 89 89
        </div>
        <div style="margin-bottom: 35px;">
            Taking care of you, HouseHub team!
        </div>
    </div>
    
    <div style="width: 612px;height: 40px;background: #1E1510;padding-top: 20px;">
        <div style="text-align: center;color: #FFF0D2;text-align: center;font-family: Roboto;font-size: 10px;font-weight: 400;line-height: 150%;">
            © 2023 - HouseHub Agency. All rights reserved.            
        </div>        
    </div>
</body>
</html>