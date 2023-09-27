မင်္ဂလာပါ ညီတို ညီမ တို့

အကို အခု က တော့ နေ့လည် က ညီတို့ ညီမ တို့ Setup အဆင်မပြေတာလေးတွေ ရယ် ပီးတော့ နောက် အကို Web Developemnt အတွက် Laravel Framework အကြောင်း (ဒိနေ့ အဆက်) ကို ဆက်ပြောဖို့ အတွက် လိုအပ်တာလေး တွေ ကြို ကြည့်ထားရမယ် ဟာလေး တွေ ကို တချက် အကို ပြန်ပီး တချက် ချင်းစီ ပြန်ပီး စီ ပြောပေးမယ်နော်

# Window Setup

1. Vs code for Editor

    - vs code ကို ကိုယ့်စက် မှာ သွင်ထားဖို့ လိုပါမယ် (https://code.visualstudio.com/)

2. Set up with WSL

    - wsl မသွင်းရသေးရင် wsl အရင် ဆုံး Install လုပ်ရန် လိုအပ်ပါမယ်
    - wsl သွင်းပီးရင် အကို တို့ Ubuntu distro တခု ကို download ဆွဲဖို့လိုအပ်ပါမယ်

    ```
        > wsl -l -o (wsl distro image list တခု ကျလာမှာ ဖြစ်ပါတယ်)
        > wsl --install -d Ubuntu-22.04 (Ubuntu 22.04 version distro ကို Download ဆွဲရန်၊ installation အဆင်ပြေတဲ့ အခါ မှာ username, password ရှိက်ပေးဖို့လိုပါတယ်, မှတ်ထားဖို့ လိုပါမယ်)
    ```

    - distro download ဆွဲပီးတဲ့ အခါမှာ

    ```
        > wsl -l
        > command ကို ရိုက်ကြည့်တဲ့ အခါ မှာ Ubuntu-22.04 (Default) ဆိုတာ ရှိနေမှာ ကို တွေ့ရပါမယ်၊ ဒါဆိုရင် Window မှာ WSL setup လုပ်တာ ပီးသွားပါပီ
    ```

3. git

    - wsl (Window) သုံးတဲ့လူတွေ ဆို ရင် အထွေ အထူး သွင်း စရာ မလိုပါဘူး, wsl> ubuntu image ထဲ မှာ git တခါတည်း install လုပ်ပီးသားပါ

4. PHP
    - ကိုယ့်ရဲ့ OS မှာ အကို တို့ PHP ကို သွင်းစရာမလို့ ပါဘူး အကိုတို့ wsl ထဲမှာ ပဲ သွင်းပါမယ်၊
    ```
        > wsl -d Ubuntu-22.04
    ```
    - လိုအပ်တဲ့ PHP library တွေ စသွင်းဖို့ လိုအပ်ပါမယ်
    ```
       > sudo apt install php8.1 php8.1 php8.1-curl php8.1-common php8.1-dom php8.1-mysql php8.1-mbstring php8.1-tokenizer php8.1-xml php8.1-fpm
    ```
5. Composer, The Dependency Manager for PHP (https://getcomposer.org/download/)
    - composer ကိုလည်း အကိုတို့ wsl ထဲ ပဲ သွင်းဖို့ လိုအပ်ပါမယ်

```
        > php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
        > php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
        > php composer-setup.php
        > php -r "unlink('composer-setup.php');"

        > sudo mv composer.phar /usr/local/bin/composer
        > composer --version
```

6. MySQL
    - mysql database ကိုလည်း wsl ထဲမှာ ပဲ Install လုပ်ရပါမယ်
      https://learn.microsoft.com/en-us/windows/wsl/tutorials/wsl-database#install-mysql အခု Link က Tutorial အတိုင်း ဆက်သွားပါမယ်

# Linux Setup

    - linux သမား များ ကတော့ wsl set up လုပ်ရန် မလိုပါ

1.  Vs code for Editor
    -   vs code ကို ကိုယ့်စက် မှာ သွင်ထားဖို့ လိုပါမယ် (https://code.visualstudio.com/)
2.  git
    -   git ကို install လုပ်ထားဖို့ လိုပါမယ်
3.  PHP

    -   PHP ကို ကိုယ့် ရဲ့ စက်မှာ ပဲ သွင်းပါမယ်၊
    -   လိုအပ်တဲ့ PHP library တွေ စသွင်းဖို့ လိုအပ်ပါမယ်

    ```
        > sudo apt install php8.1 php8.1 php8.1-curl php8.1-common php8.1-dom php8.1-mysql php8.1-mbstring php8.1-tokenizer php8.1-xml php8.1-fpm
    ```

4.  Composer, The Dependency Manager for PHP (https://getcomposer.org/download/).

```

    > php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    > php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" > php composer-setup.php > php -r "unlink('composer-setup.php');"
    > sudo mv composer.phar /usr/local/bin/composer
    > composer --version

```

5.  MySQL
    -   ref link https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-22-04

```

    > sudo apt update
    > sudo apt install mysql-server
    > sudo apt install mysql-client

```

# Mac Setup

    - Mac သမား များ ကတော့ wsl set up လုပ်ရန် မလိုပါ

1.  Vs code for Editor
    -   vs code ကို ကိုယ့်စက် မှာ သွင်ထားဖို့ လိုပါမယ် (https://code.visualstudio.com/)
2.  git
    -   git ကို install လုပ်ထားဖို့ လိုပါမယ်
3.  PHP
    mac သမား တွေ ကတော့ နဲနဲ လေး google ခေါက်ပီး Install လုပ်ပေးနော် တကယ် လိ့ အဆင်မပြေရင် အကိုနဲ့တွေ့တဲ့ အခါ အကို ကူပီး လုပ်ပေးပါမယ်
    -   php8.1 php8.1 php8.1-curl php8.1-common php8.1-dom php8.1-mysql php8.1-mbstring php8.1-tokenizer php8.1-xml php8.1-fpm
4.  Composer, The Dependency Manager for PHP (https://getcomposer.org/download/)

5.  MySQL
    -   ref link https://www.bytebase.com/blog/how-to-install-mysql-client-on-mac-ubuntu-centos-windows/

# Final Note

    - Laravel Framework ကို မသွားခင် မှာ PHP Basic ကို Self Study အရင် လုပ်ထားစေချင်ပါတယ်
    - PHP Fundamentals
        - Syntax
        - Variables
        - Constants
        - Comments
        - var_dump
    - PHP Data Types
    - PHP Operators
    - PHP Control Flow
        - if, if-else, if-elseif, ternary operator
        - for, while, foreach, do-while, brake, continue
    - PHP Function
    - PHP Array
    - OOP with PHP
