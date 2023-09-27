# Release Notes

## [Unreleased](https://github.com/laravel/laravel/compare/beta...main)

## [beta](https://github.com/laravel/laravel/compare/v9.5.2...beta) - 2023-09-27

မင်္ဂလာပါ ညီတို ညီမ တို့

အကို အခု က တော့ နေ့လည် က ညီတို့ ညီမ တို့ Setup အဆင်မပြေတာလေးတွေ ရယ် ပီးတော့ နောက် အကို Web Developemnt အတွက် Laravel Framework အကြောင်း (ဒိနေ့ အဆက်) ကို ဆက်ပြောဖို့ အတွက် လိုအပ်တာလေး တွေ ကြို ကြည့်ထားရမယ် ဟာလေး တွေ ကို တချက် အကို ပြန်ပီး တချက် ချင်းစီ ပြန်ပီး စီ ပြောပေးမယ်နော်

### Window Setup

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
    > wsl -d Ubuntu-22.04      
    လိုအပ်တဲ့ PHP library တွေ စသွင်းဖို့ လိုအပ်ပါမယ်      
    sudo apt install php8.1 php8.1 php8.1-curl php8.1-common php8.1-dom php8.1-mysql php8.1-mbstring php8.1-tokenizer php8.1-xml php8.1-fpm      
       
  
5. Composer, The Dependency Manager for PHP (https://getcomposer.org/download/)   
     
  - composer ကိုလည်း အကိုတို့ wsl ထဲ ပဲ သွင်းဖို့ လိုအပ်ပါမယ်      
          
    > php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"      
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"      
    php composer-setup.php      
    php -r "unlink('composer-setup.php');"      
          
    > sudo mv composer.phar /usr/local/bin/composer      
    composer --version      
       
  
6. MySQL   
     
  - mysql database ကိုလည်း wsl ထဲမှာ ပဲ Install လုပ်ရပါမယ်      
    https://learn.microsoft.com/en-us/windows/wsl/tutorials/wsl-database#install-mysql အခု Link က Tutorial အတိုင်း ဆက်သွားပါမယ်   
  

### Linux Setup

```- linux သမား များ ကတော့ wsl set up လုပ်ရန် မလိုပါ
```
1. Vs code for Editor   
     
  - vs code ကို ကိုယ့်စက် မှာ သွင်ထားဖို့ လိုပါမယ် (https://code.visualstudio.com/)   
  
2. git   
     
  - git ကို install လုပ်ထားဖို့ လိုပါမယ်   
  
3. PHP   
     
  - PHP ကို ကိုယ့် ရဲ့ စက်မှာ ပဲ သွင်းပါမယ်၊   
  - လိုအပ်တဲ့ PHP library တွေ စသွင်းဖို့ လိုအပ်ပါမယ်      
    > sudo apt install php8.1 php8.1 php8.1-curl php8.1-common php8.1-dom php8.1-mysql php8.1-mbstring php8.1-tokenizer php8.1-xml php8.1-fpm      
       
  
4. Composer, The Dependency Manager for PHP (https://getcomposer.org/download/).   
     
  > php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"   
  php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" > php composer-setup.php > php -r "unlink('composer-setup.php');"   
  sudo mv composer.phar /usr/local/bin/composer   
  composer --version   
  
5. MySQL   
     
  > sudo apt update   
  sudo apt install mysql-server   
  sudo apt install mysql-client   
     
  - ref link https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-22-04   
  

### Mac Setup

```- Mac သမား များ ကတော့ wsl set up လုပ်ရန် မလိုပါ
```
1. Vs code for Editor   
     
  - vs code ကို ကိုယ့်စက် မှာ သွင်ထားဖို့ လိုပါမယ် (https://code.visualstudio.com/)   
  
2. git   
     
  - git ကို install လုပ်ထားဖို့ လိုပါမယ်   
  
3. PHP   
  mac သမား တွေ ကတော့ နဲနဲ လေး google ခေါက်ပီး Install လုပ်ပေးနော် တကယ် လိ့ အဆင်မပြေရင် အကိုနဲ့တွေ့တဲ့ အခါ အကို ကူပီး လုပ်ပေးပါမယ်   
     
  - php8.1 php8.1 php8.1-curl php8.1-common php8.1-dom php8.1-mysql php8.1-mbstring php8.1-tokenizer php8.1-xml php8.1-fpm   
  
4. Composer, The Dependency Manager for PHP (https://getcomposer.org/download/)   
  
5. MySQL   
     
  - ref link https://www.bytebase.com/blog/how-to-install-mysql-client-on-mac-ubuntu-centos-windows/   
  

### Final Note

```- Laravel Framework ကို မသွားခင် မှာ PHP Basic ကို Self Study အရင် လုပ်ထားစေချင်ပါတယ်
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
```
## [v9.5.2](https://github.com/laravel/laravel/compare/v9.5.1...v9.5.2) - 2023-01-31

### Changed

- Adds "missing" validation rule translations by @timacdonald in https://github.com/laravel/laravel/pull/6078

## [v9.5.1](https://github.com/laravel/laravel/compare/v9.5.0...v9.5.1) - 2023-01-11

### Changed

- Use minimum stability "stable" by @taylorotwell in https://github.com/laravel/laravel/commit/c1092ec084bb294a61b0f1c2149fddd662f1fc55

## [v9.5.0](https://github.com/laravel/laravel/compare/v9.4.1...v9.5.0) - 2023-01-02

### Changed

- Update to Heroicons v2 by @driesvints in https://github.com/laravel/laravel/pull/6051
- Support pusher-js v8.0 by @balu-lt in https://github.com/laravel/laravel/pull/6059
- Switch password reset email to a primary key by @browner12 in https://github.com/laravel/laravel/pull/6064

## [v9.4.1](https://github.com/laravel/laravel/compare/v9.4.0...v9.4.1) - 2022-12-19

### Changed

- Add decimal translation by @taylorotwell in https://github.com/laravel/laravel/commit/39f4830e92a7467b2a7fe6bc23d0ec14bc3b46a6

## [v9.4.0](https://github.com/laravel/laravel/compare/v9.3.12...v9.4.0) - 2022-12-15

### Added

- Vite 4 support by @timacdonald in https://github.com/laravel/laravel/pull/6043

### Changed

- Add ulid and ascii validation message by @nshiro in https://github.com/laravel/laravel/pull/6046

## [v9.3.12](https://github.com/laravel/laravel/compare/v9.3.11...v9.3.12) - 2022-11-22

### Changed

- Bump vite plugin version by @timacdonald in https://github.com/laravel/laravel/pull/6038

## [v9.3.11](https://github.com/laravel/laravel/compare/v9.3.10...v9.3.11) - 2022-11-14

### Changed

- Adds lowercase validation rule translation by @timacdonald in https://github.com/laravel/laravel/pull/6028
- Adds uppercase validation rule translation by @michaelnabil230 in https://github.com/laravel/laravel/pull/6029

## [v9.3.10](https://github.com/laravel/laravel/compare/v9.3.9...v9.3.10) - 2022-10-28

### Changed

- Changing .env to make Pusher work without editing the commented out part in the bootstrap.js by @cveldman in https://github.com/laravel/laravel/pull/6021

## [v9.3.9](https://github.com/laravel/laravel/compare/v9.3.8...v9.3.9) - 2022-10-17

### Changed

- Update welcome page colours by @timacdonald in https://github.com/laravel/laravel/pull/6002
- Ignore .env.production by @yasapurnama in https://github.com/laravel/laravel/pull/6004
- Upgrade axios to v1.x by @ankurk91 in https://github.com/laravel/laravel/pull/6008
- Shorten pusher host config by @buihanh2304 in https://github.com/laravel/laravel/pull/6009

## [v9.3.8](https://github.com/laravel/laravel/compare/v9.3.7...v9.3.8) - 2022-09-20

### Changed

- Validation added `required_if_accepted` by @luisprmat in https://github.com/laravel/laravel/pull/5987

## [v9.3.7](https://github.com/laravel/laravel/compare/v9.3.6...v9.3.7) - 2022-09-02

### Changed

- Make email unique by @martin-ro in https://github.com/laravel/laravel/pull/5978

## [v9.3.6](https://github.com/laravel/laravel/compare/v9.3.5...v9.3.6) - 2022-08-29

### Changed

- Bump Vite plugin version by @timacdonald in https://github.com/laravel/laravel/pull/5977

## [v9.3.5](https://github.com/laravel/laravel/compare/v9.3.4...v9.3.5) - 2022-08-22

### Changed

- `max_digits` and `min_digits` validation translations by @danharrin in https://github.com/laravel/laravel/pull/5975
- Use short closure by @taylorotwell in https://github.com/laravel/laravel/commit/7b17f5f32623c2ee75f2bff57a42bb8f180ac779
- Use except by @taylorotwell in https://github.com/laravel/laravel/commit/e2e25f607a894427d6545f611ad3c8d94d022e9d

## [v9.3.4](https://github.com/laravel/laravel/compare/v9.3.3...v9.3.4) - 2022-08-15

### Changed

- Add ValidateSignature middleware for ignore params by @valorin in https://github.com/laravel/laravel/pull/5942

## [v9.3.3](https://github.com/laravel/laravel/compare/v9.3.2...v9.3.3) - 2022-08-03

### Changed

- Validation added `doesnt_end_with` translation by @kichetof in https://github.com/laravel/laravel/pull/5962

## [v9.3.2](https://github.com/laravel/laravel/compare/v9.3.1...v9.3.2) - 2022-08-01

### Changed

- Update Sanctum by @suyar in https://github.com/laravel/laravel/pull/5957
- Allow Pest plugin in Composer by @driesvints in https://github.com/laravel/laravel/pull/5959

## [v9.3.1](https://github.com/laravel/laravel/compare/v9.3.0...v9.3.1) - 2022-07-26

### Changed

- Update font delivery by @abenerd in https://github.com/laravel/laravel/pull/5952
- Don't need to ignore vite config file by @GrahamCampbell in https://github.com/laravel/laravel/pull/5953

## [v9.3.0](https://github.com/laravel/laravel/compare/v9.2.1...v9.3.0) - 2022-07-20

### Added

- Uses `laravel/pint` for styling by @nunomaduro in https://github.com/laravel/laravel/pull/5945

### Changed

- Bump axios version by @ankurk91 in https://github.com/laravel/laravel/pull/5946
- Vite 3 support by @timacdonald in https://github.com/laravel/laravel/pull/5944

## [v9.2.1](https://github.com/laravel/laravel/compare/v9.2.0...v9.2.1) - 2022-07-13

### Changed

- Add auth.json to skeleton by @driesvints in https://github.com/laravel/laravel/pull/5924
- Update `bootstrap.js` by @irsyadadl in https://github.com/laravel/laravel/pull/5929
- Add default reloading to skeleton by @timacdonald in https://github.com/laravel/laravel/pull/5927
- Update to the latest version of laravel-vite-plugin by @jessarcher in https://github.com/laravel/laravel/pull/5943

## [v9.2.0](https://github.com/laravel/laravel/compare/v9.1.10...v9.2.0) - 2022-06-28

### Added

- Vite by @jessarcher in https://github.com/laravel/laravel/pull/5904
- Added support for easy development configuration in bootstrap.js by @rennokki in https://github.com/laravel/laravel/pull/5900

### Changed

- Sorted entries in the `en` validation translations file by @FaridAghili in https://github.com/laravel/laravel/pull/5899

## [v9.1.10](https://github.com/laravel/laravel/compare/v9.1.9...v9.1.10) - 2022-06-07

### Changed

- Add language line by @taylorotwell in https://github.com/laravel/laravel/commit/b084aacc5ad105e39c2b058e9523e73655be8d1f
- Improve Pusher configuration for easy development by @oanhnn in https://github.com/laravel/laravel/pull/5897

## [v9.1.9](https://github.com/laravel/laravel/compare/v9.1.8...v9.1.9) - 2022-05-28

### Changed

- Switch to ESM imports by @jessarcher in https://github.com/laravel/laravel/pull/5895

## [v9.1.8](https://github.com/laravel/laravel/compare/v9.1.7...v9.1.8) - 2022-05-05

### Changed

- Add local_domain option to smtp configuration by @bintzandt in https://github.com/laravel/laravel/pull/5877
- Add specific test user in seeder by @driesvints in https://github.com/laravel/laravel/pull/5879

## [v9.1.7](https://github.com/laravel/laravel/compare/v9.1.6...v9.1.7) - 2022-05-03

### Changed

- Deprecation log stack trace option by @driesvints in https://github.com/laravel/laravel/pull/5874

## [v9.1.6](https://github.com/laravel/laravel/compare/v9.1.5...v9.1.6) - 2022-04-20

### Changed

- Move password lines into main translation file by @taylorotwell in https://github.com/laravel/laravel/commit/db0d052ece1c17c506633f4c9f5604b65e1cc3a4
- Add missing maintenance to config by @ibrunotome in https://github.com/laravel/laravel/pull/5868

## [v9.1.5](https://github.com/laravel/laravel/compare/v9.1.4...v9.1.5) - 2022-04-12

### Changed

- Rearrange route methods by @osbre in https://github.com/laravel/laravel/pull/5862
- Add levels to handler by @taylorotwell in https://github.com/laravel/laravel/commit/a507e1424339633ce423729ec0ac49b99f0e57d7

## [v9.1.4](https://github.com/laravel/laravel/compare/v9.1.3...v9.1.4) - 2022-03-29

### Changed

- Add encryption configuration by @taylorotwell in https://github.com/laravel/laravel/commit/f7b982ebdf7bd31eda9f05f901bd92ed32446156

## [v9.1.3](https://github.com/laravel/laravel/compare/v9.1.2...v9.1.3) - 2022-03-29

### Changed

- Add an example to the class aliases by @nshiro in https://github.com/laravel/laravel/pull/5846
- Add username in config to use with phpredis + ACL by @neoteknic in https://github.com/laravel/laravel/pull/5851
- Remove "password" from validation lang by @mnastalski in https://github.com/laravel/laravel/pull/5856
- Make authenticate session a route middleware by @taylorotwell in https://github.com/laravel/laravel/pull/5842

## [v9.1.2](https://github.com/laravel/laravel/compare/v9.1.1...v9.1.2) - 2022-03-15

### Changed

- The docker-compose.override.yml should not be ignored by default by @dakira in https://github.com/laravel/laravel/pull/5838

## [v9.1.1](https://github.com/laravel/laravel/compare/v9.1.0...v9.1.1) - 2022-03-08

### Changed

- Add option to configure Mailgun transporter scheme by @jnoordsij in https://github.com/laravel/laravel/pull/5831
- Add `throw` to filesystems config by @ankurk91 in https://github.com/laravel/laravel/pull/5835

### Fixed

- Small typo fix in filesystems.php by @tooshay in https://github.com/laravel/laravel/pull/5827
- Update sendmail default params by @driesvints in https://github.com/laravel/laravel/pull/5836

## [v9.1.0](https://github.com/laravel/laravel/compare/v9.0.1...v9.1.0) - 2022-02-22

### Changed

- Remove namespace from Routes by @emargareten in https://github.com/laravel/laravel/pull/5818
- Update sanctum config file by @suyar in https://github.com/laravel/laravel/pull/5820
- Replace Laravel CORS package by @driesvints in https://github.com/laravel/laravel/pull/5825

## [v9.0.1](https://github.com/laravel/laravel/compare/v9.0.0...v9.0.1) - 2022-02-15

### Changed

- Improve typing on user factory by @axlon in https://github.com/laravel/laravel/pull/5806
- Align min PHP version with docs by @u01jmg3 in https://github.com/laravel/laravel/pull/5807
- Remove redundant `null`s by @felixdorn in https://github.com/laravel/laravel/pull/5811
- Remove default commented namespace by @driesvints in https://github.com/laravel/laravel/pull/5816
- Add underscore to prefix in database cache key by @m4tlch in https://github.com/laravel/laravel/pull/5817

### Fixed

- Fix lang alphabetical order by @shuvroroy in https://github.com/laravel/laravel/pull/5812

## [v9.0.0 (2022-02-08)](https://github.com/laravel/laravel/compare/v8.6.11...v9.0.0)

Laravel 9 includes a variety of changes to the application skeleton. Please consult the diff to see what's new.
