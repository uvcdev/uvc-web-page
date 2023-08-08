# uvc-web-page
uvc 홈페이지 

## 1. Features

    - commit 규칙
    ADD⚡(:zap:),
    FIX🔨(:hammer:),
    UPDATE🖊️(:pen:),
    DELETE🗑️(:wastebasket:)

## 2. Contributor

- [jieb777] jieb@uvc.co.kr
- [kalosdo] kalosdo@uvc.co.kr
- [zil2i] zimmy@uvc.co.kr

## 3. Structure
- update 23.08.08
```
├── UVC                                  # 정적파일 서비스 공간 (공용 css 파일이나 image 파일 등)
│   ├── _upload                          # 이미지 파일
│   │   ├── board                        #
│   │   ├── certify                      #
│   │   ├── news                         # 
│   │   ├── notice                       # 
│   │   └── partner                      # 
│   ├── app                              #
│   │   └── App.php                      #    
│   ├── inc                              # 
│   │    ├── db.php                      # 
│   │    ├── file_convert.php            # 
│   │    └── gf.php                      # 
│   ├── lib                              # lib
│   ├── mvc                              # 
│   ├── page                             # 
│   │    ├── adm                         # 관리자 페이지
│   │    │   ├── css                     # 
│   │    │   ├── img                     #
│   │    │   ├── include                 #
│   │    │   ├── js                      #  
│   │    │   └── ...                     #
│   │    ├── homepage                    #
│   │    │   ├── css                     # 
│   │    │   ├── img                     #
│   │    │   ├── include                 #
│   │    │   ├── js                      #  
│   │    │   └── ...                     #
│   │    └── ...                         #
│   ├── vendor                           #       
│   └── action.php                       # 
├── index.php                            # main
├── index3.php                           # 
├── robot.txt                            # 
└── README.md                            # .
