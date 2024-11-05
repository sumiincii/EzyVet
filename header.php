<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="header.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        /* Existing styles... */

        /* Add the sticky class styles */
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            /* Ensure it stays above other content */
            transition: background-color 0.3s;
            /* Smooth transition for background color */
        }

        .sticky+.container-fluid {
            padding-top: 60px;
            /* Adjust based on the height of your nav */
        }

        body {
            background-color: #ffffff;
            font-family: "Montserrat", sans-serif, "Allura", "Playfair Display" !important;
        }

        nav a::before {
            content: "";
            position: absolute;
            top: 100%;
            left: 0;
            width: 0;
            height: 2.5px;
            /* background: #c1cad3; */
            background: #8b61c2;
            transition: 0.3s;
        }

        #wc {
            /* background-color: #c1cad3; */
            background-color: #8b61c2;
            padding: 7px;
            /* color: #3e444b; */
            color: white;
        }

        nav a:hover::before {
            width: 100%;
        }

        nav {
            margin-top: 10px;
            background: #fff;
        }

        .logo {
            margin-left: 125px;
            width: 200px;
            height: auto;
        }

        nav ul {
            padding: 0;
            margin: 0;
            float: right;
            margin-right: 102px;
        }

        nav ul li {
            background: #fff;
            position: relative;
            list-style: none;
            display: inline-block;
        }

        nav ul li a {
            display: block;
            padding: 0 25px;
            color: #3e444b;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            line-height: 60px;
            letter-spacing: 2px;
        }

        .hober a:hover {
            /* background: rgb(150, 150, 150); */
            background: #8b61c2;
            color: white;

        }

        nav ul ul {
            position: absolute;
            top: 65px;
            display: none;
        }

        nav ul li:hover>ul {
            display: block;
            box-shadow: 0 7px 14px rgba(0, 0, 0, 1);
            border: 1px solid #3e444b;
        }

        nav ul ul li {
            width: 159px;
            float: none;
            display: list-item;
            position: relative;
        }

        a img {
            margin-top: -25px;
            /* margin-left: -50px; */
        }
    </style>
</head>

<body>

    <div class="container1 container-fluid text-center">
        <div class="row">
            <div class="col" id="wc">Welcome to <b>Dr. Ron Veterinary Clinic</b> , your trusted partner in providing top-notch veterinary care for your beloved pets.</div>
        </div>
    </div>
    <a href="landing.php"><img class="logo img-fluid float-start" src="images/mainlogo.png" alt="logo"></a>

    <div class="container-fluid text-center">
        <div class="dropdown">
            <nav>
                <ul>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICES</a>
                        <ul>
                            <li class="hober"><a href="checkup.php">Checkups</a></li>
                            <li class="hober"><a href="vaccinations.php">Vaccinations</a></li>
                            <li class="hober"><a href="grooming.php">Grooming</a></li>
                            <li class="hober"><a href="followup.php">Follow Up</a></li>
                        </ul>
                    </li>
                    <li><a href="appointment.php">BOOK NOW</a></li>
                    <li><a href="contactus.php">CONTACT US</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <br><br><br><br><br><br><br><br>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt neque nobis omnis vitae non. Possimus repellendus iste nam omnis alias soluta quae dolor facere odio illo quis beatae cumque, distinctio ducimus est amet animi delectus saepe eaque rem culpa ipsa porro. Voluptatibus autem cumque recusandae tempore reiciendis quaerat aut ea sapiente quae culpa architecto at dolorem veritatis quos facere quod, vel omnis! Rerum quisquam totam laborum tempora. Quos hic dolore repudiandae dolores iusto praesentium voluptatum et distinctio, sunt, labore expedita ipsam reiciendis, ipsum quis eligendi architecto aut eos nulla similique illo exercitationem. Esse harum et expedita ab mollitia, cum consequatur odio, quidem sapiente quisquam quos adipisci! Eveniet nisi aliquid accusamus, at harum eligendi quia aspernatur sequi? Eum est itaque magnam quisquam consequatur. Ea assumenda, cumque facilis fugiat quos tempore soluta enim est possimus consectetur accusamus, placeat maxime quia. Fuga eaque minima tempore expedita atque totam. Dolorum, veniam. Deserunt, reiciendis nemo labore quis fuga debitis porro consequatur quas sequi, obcaecati vero vitae quia veritatis ratione reprehenderit odio esse saepe? Dolorum minus soluta sapiente distinctio illo aliquam voluptatem asperiores quasi quidem totam ipsum explicabo, repudiandae dolore officia error nam modi, eum consectetur eos quo tempora molestiae! Nulla neque numquam temporibus? Incidunt, possimus officia! Possimus corporis, et animi accusamus placeat aperiam aliquam. Quas, vitae unde obcaecati mollitia minima quae sit corrupti distinctio delectus laboriosam minus! Minima ex tempora itaque officiis dignissimos. Quod repudiandae dolore voluptatem natus velit animi maiores consectetur debitis neque soluta atque ipsa amet eius voluptatum unde inventore, ab dolor aperiam porro illo, molestiae, quas voluptates quisquam! Minus a ducimus eaque, ratione vitae dignissimos numquam ipsam, inventore velit fugiat sit nesciunt fuga odio in dicta error maiores non quis quod hic minima sapiente placeat quisquam! Doloribus reprehenderit labore provident officiis a culpa voluptates, odit molestias, ratione laborum doloremque, quibusdam rem! Quibusdam illo necessitatibus excepturi amet iure ipsa delectus, accusantium in laboriosam. Aut at amet quo aliquid sed quae cum a provident perferendis et deleniti veritatis eos est odit illum ipsam, quasi nihil accusamus explicabo ex nobis cupiditate nam! Hic nobis ratione nisi! Iure expedita sit consequuntur autem culpa dolor porro. Officiis ullam officia repellat assumenda nostrum incidunt eum, sint, est impedit exercitationem accusamus? Cumque consequuntur consequatur aut illum voluptates nulla, dolores maxime excepturi dolore? Eius, maxime. Officiis officia deserunt eos in qui reprehenderit laborum impedit quam odit maxime molestias sed eligendi excepturi porro pariatur dignissimos ex consequatur harum exercitationem, quibusdam minima magni dicta quae cumque. Amet, pariatur! Quaerat neque pariatur ad dignissimos reprehenderit sapiente, nemo iusto? Beatae, eum inventore. Nisi corrupti voluptatum deleniti, repellendus earum quis, eligendi odio voluptates mollitia pariatur laborum nam. Rerum quos consectetur recusandae sint, labore exercitationem nobis molestias reiciendis veniam voluptate laborum eum ipsam itaque nemo, aspernatur quo eos dolorum illum pariatur dolor voluptas delectus vitae, ea optio? Magni, maiores alias atque molestias possimus dolor inventore deserunt hic molestiae temporibus minima. Sed reprehenderit adipisci magnam animi voluptatum ab! Dolore ratione aperiam voluptatibus consectetur consequatur iusto numquam perspiciatis qui, culpa eius! In, ex nostrum facere perspiciatis fuga molestiae libero tenetur ipsam ipsum cumque modi ratione inventore atque animi eum quidem quas eligendi. Qui deleniti accusamus id eveniet dolor tempora repudiandae minima animi asperiores debitis inventore, magni corporis repellat eos ipsam provident accusantium, nostrum sed corrupti. Quidem, qui. Dolor optio architecto, nobis minus aliquam ipsa iusto suscipit sit quibusdam aliquid laudantium nostrum asperiores harum sed quia quae autem? Pariatur, blanditiis cumque dicta natus eos fugiat voluptatum temporibus harum amet et ullam sunt molestiae laboriosam nostrum eius accusamus dolorem aliquam officia magnam iure necessitatibus deleniti molestias repellat adipisci? Consequatur aliquam, laborum harum vitae repudiandae nam praesentium ea numquam voluptatum corporis expedita doloremque temporibus illum rerum animi, repellat, nesciunt obcaecati eos excepturi. Iusto voluptatem optio, consectetur laudantium provident nobis placeat nihil! Qui accusantium sed, laborum debitis culpa dolorem cumque reiciendis harum laudantium est rerum ex ipsum veniam doloribus vitae quo dolor quidem eveniet ut, excepturi doloremque pariatur eum quis! Fugiat quis, praesentium maiores dicta illo adipisci maxime, enim sapiente ipsa, assumenda tempore voluptatem. Quaerat voluptas et ea nisi est eaque beatae explicabo voluptatum asperiores quasi distinctio laudantium iusto molestiae unde eos, blanditiis neque nemo voluptatibus, autem repellendus hic. Error mollitia corrupti libero quae veritatis maiores, odio quasi qui dolorum ab? Placeat laudantium mollitia officiis distinctio iste eum repellat quae sapiente error dolor facere eos voluptate, commodi nulla culpa aliquam itaque consectetur repellendus autem? Consequuntur illum rem molestias, explicabo possimus quae cumque. Maxime necessitatibus possimus, exercitationem facilis asperiores saepe blanditiis debitis quidem omnis natus explicabo sapiente atque in nisi eius odio. Exercitationem corrupti provident ut fuga rem, aliquid assumenda accusantium alias amet eos ullam fugiat doloribus ratione, nam nihil, distinctio nostrum. Aliquam dignissimos incidunt perferendis cupiditate itaque reiciendis sed magnam in, saepe totam ut voluptates blanditiis, voluptatem repellat, alias ratione. Et consectetur minima quos hic maxime ipsam asperiores illo, velit nulla quisquam voluptates quod possimus non odio sunt distinctio at consequatur ex rem itaque architecto dicta adipisci! Perferendis voluptas doloribus sunt eos ducimus culpa totam harum neque consectetur cum. Sint impedit, a aut iusto fuga odit atque fugiat corrupti dolore totam animi illo, neque voluptate necessitatibus qui inventore placeat ab? Exercitationem doloremque reprehenderit necessitatibus rem fugiat, mollitia repellat totam ullam quia, velit aperiam eaque nihil dolorum nobis laudantium corporis. Unde porro quae exercitationem veritatis, facere minima accusamus molestias beatae nobis consequuntur deleniti sit dicta. Vel modi similique, magni deleniti autem sunt quod obcaecati, est corrupti libero atque fugiat expedita ducimus eius eveniet enim magnam. Quae qui quaerat sequi cupiditate labore praesentium dolor dignissimos, veniam tempora, sapiente repellendus perferendis id! Vero unde quas nulla laudantium asperiores ut deleniti ratione, voluptates modi quae officiis delectus, libero facilis quasi iusto nihil aperiam itaque. Odit voluptatum a vero architecto dolore necessitatibus, possimus modi quibusdam odio labore nisi aliquam commodi aut quaerat sapiente ipsam nulla iure facere cumque. Sed odio perspiciatis fugiat odit? Necessitatibus dicta dolorem, perferendis amet ea ut ratione eveniet exercitationem omnis, accusantium voluptas sunt? Officia velit soluta magnam laboriosam natus, officiis ullam quia optio molestiae doloremque aperiam architecto reiciendis sint facere fuga hic earum!</p>

    <script>
        // Get the navbar
        const navbar = document.querySelector('nav');

        // Get the offset position of the navbar
        const sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position
        // Remove "sticky" when you leave the scroll position
        function handleScroll() {
            if (window.pageYOffset > sticky) {
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }
        }

        // When the user scrolls the page, execute handleScroll
        window.onscroll = function() {
            handleScroll();
        };
    </script>

</body>

</html>