<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile View</title>
    <link rel="stylesheet" href="../public/css/profileView.css">
    <script src="https://kit.fontawesome.com/1ae923e323.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("side_menuView.php") ?>
    <div class="container">
        <div>
            <img id="cover-img" src="https://i.natgeofe.com/k/33e48abd-f2e7-4430-b7bf-cc9a18c14cc6/brazil-christ-the-redeemer_2x1.jpg">
            <div>
                <section>
                    <div class="basic-info">
                        <!-- <div id="profile-images"> -->
                            <img id="country-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQwAAAC8CAMAAAC672BgAAABO1BMVEUAmzr+3wAAJ3b/////4wAAljwAmTv/3wD/5wAAJXUAmDsAH3MAAHv/5AAAI3QAAGwAHngAG3IAGnkADW4ACXsAHnMAF3Dq2QukwSL03AUAG3gAFXCwxR9hrS/U0RTc1BEAD3pKpzLByxp6tCuPuie5yB1tsC2FtylVqjGbviQAFXqbkUkvojYACG0pPG5HpzNTV2e/rThnaF7gyB/RvCtbX2J/elYZNH0AKXN3gqmCjK8qQIJTWWNcaprQ1OE3ozWWjE9ublpGT2iNhVHjyx37+P9htnglpE7p6/Ln9Ot5v4vO59WWzKWmrcWu17k9T4uMyJyWn7ytnkQ0RGrGszIqPoHZ2ueepL98h6xArF/y56pWsnDb7eAAjADE4csxqFi8v9Tz3mbz679tuoFMXJL64lhjcJ3TxXT079IxqvOYAAAMI0lEQVR4nO2dDVvayBbHAwOUcWBCCOAq3V23b9taaX1beStUbVGQV2tRWaiyV5Z7v/8nuDMJ2KCZkASUgPN79tmnu0Uhf86cOfPPmYkgcDgcDofD4XA4HA6Hw+FwOBwOh8OZAT7CrD+DU/B+XF7+wzvrT+EIfL7nHpfL85wHBwmLX1eIFkSNlV+fenAsCS8UKRQ5XpD/fMJ4X7pGePl0g2Np4zfPM60Wzzy/bTzN4PB5X7l0eOV9gonU+/n30bAYBsfy56c2VnzeXzz3lRgk0l+WnlRweN8uM7Wgs+zbpxMcPt9rAykUOV4/lRLM+8ZYCZU3TyE4tGWWAWSWXfgSzOf900xYqPy52LOsd0N3PmUFx+8biztWfN53ZkaIBs+7RQ0O78dl82ExDI7FNDp8S88thsUgOBbQ6BjaFjbUWDSjw+R8ypJjoYyOu7aFdRbG6FgSfrOaOO+yKEaHz/tqghHyE88CGB0M2+L2EoN+DUED2ebf6PAtGdgWQb9rZ2v/YPMDWgsE1tCHzYP9rR2XgSLzbXSwbQuP37P75XA9sh4OIQyh2w0hRqHweiR8+OW7y8/6qfk1OnwCy7bwu7a219bCiIhwF4jCa2vbW+Ql+nK8FuYyOLxvVhhBsbMXWgvpCHErCPnrvR1GeKzModHBKrM8/t1PgVUDJQZ6rAY+7erLMXdGB9O28O9uBkLjlFAJBTZ3GYNlrowOlm0RXDkwK4Uqx8FKUOfXzJPRwbQt/N/WV81LQVld/6YfHPNidLBsi+DKZmRsrrgLXNtkBMc8GB1qt4VeWHxftTBCfhJa/c4IDscbHUzbwr8fwHa0cLtxYJ+hhrONDrZtEdyO2JOCEtnWGykuZxsdBrbF4bp9Ldzu9UPmL37pzER6r9tCw1l4Ei3c7vAZ4xdTo8N5Y4XRbaFG85nFGfU+q2fs1b3jjA7vZ/ZtgODmhHGhxMYhI2/QWfajk4LDyLZw+Q8myhdD1g8YtbnLWUaH963BbQD/+wnmES2R9wZqOMXoMO628OwGpqOF2x3YNXofR3R0jOu2iNqste6Do8bvNHOjg5ZZRrcB/H/ZqsH1Cf3FHiiz7+gY220R3JpSwlCJbLGmlAEzNDpMdFsYuXvWgSHjd5ud0WGi28K/N4UKQ0t4z2igUGZjdHj/GN9t8XWqg4QS+DrmLWdhdJjqtvBv32ZPiAdAONHACW2PC43HNzrMdVvsBKS4nBAJMZhsZrP1bLOZitL/kZDjsSi2I0tgZ/z7PqrRYbLbIrhd759Wu+fFAhileJ7vXlzmkkSUuGRRkpBBVa6R49GMDpPdFs++AlAil15rt44AaPmEEwCE4+Nj8ucSqKiq5C/S2YQoS+YLMxgZlzUGPEpHh5FtMSrG36DdFkrgpAwaNdAC4KgDjktUnh9XtR+KGCXl3+fVNB4VxEib8P6YWmPw7o/Q0WGl2wJ0bkDnCFRarY0SFaNyBYTKSQeUWpV2S5Gh0bo+GYycbtotxpH65Ut1iT12cMrMOKE8dEfHmG6Lka/mH6pEqQ1qNRocrVpNIMOkXC6DcsXXaCsStE9qqhaVNvnD+UVdlBGEydx5L8tWI2K0Xhv5BA/a0WFoW9z7KP8hF3tzXAZXNUAUuKrQ665VGiegfNUuqWK0SgMxrktUqg4oVHuiLFdBN8YWY3XP1DhReDijw9C2uA+9yA7NCoViMZ/vDsjnNbPLcetESRulHydXNG6Oj0qgWM2m06cxdtLASfNiPJTRwe620OXZv2Su6J6me25aZ4iJhKySUOoOqd7PVPNFGgxACZhOpQOuGuDqRsmoGTlhkEMjJkoNjRwvpt/Rweq2YH6Gb2FRlOOSfmkFcTQWT4iJbP8iT+LkSomPo6PjYzKkfEIZgG5dZCbR9fcWQoMyZaODdi9a+wCDUhwn9dpzfmoixUUxme4WqRg+kmTIWCGjRwmPvsgYK2ZKci3TNTosbRIZiqE4XKlUN5kcV2JiSaaCkAgp3dDph6rSIDFSzCTiuq9H1sSgTM3osLRJZMiKYn3GTkExa6a8xFJC7FVpgFxX2hVQaYBrmk4yclxHyoC1EeuantFhfZMIxfN9jX5slOtWZRNaUCCSxTrRo0ZSxjXokImo0i6BjM5gWftu5xNNwegwY1vovfU35WYJTMmWFmJEj1yXlqaNCinYrzvXFVBIi+jOq9a/2RBjcqOD2W0xjuAX1eOCbovrdBhNRDNFUDlqgIpQK9FcWsyJoyMt/MXidDJgMqPD/iYR/4F9VxzFxVwe0HmlQWbZykYF5JOyVlNzy3g9NewbHUvCC3vfABXjU9SuFtGeDKNitkvWtJ0GWeKCGln6noqa3xf6ZFMM+0bHRJtE/Gd3B7pZcLNAi3EsJrug3AE3tVZDWdb2xNvgQGe2xXDZ6ugwbVswxPhgVwy3dJlTfhYnUiSXCqQmJSUqyaRVeRgc6MMEYtjp6Hhn/+0UMQyrC2OhpOFfY7HZJWmUiHFUq938DA6cnSQy6CzrHDEw7EkmowSL9XOymKuUhDIdLFV1ln10MR5umOBmvpgzPYiQmCZlR6W0AUD5pFRs0gL90YfJAyZQuXoumtWCEJOrZKyQtb2v1iqDNBkqj55AhUmnVoM6I4VSFsRwQ7FOFy21q3aHSNIV8QymVuHhii6rd4+QeKHUYOok607MoOgSplCOm/zukZHrQV+QqBdL160TssI/vgL1mZTjwqQLNQ0GUy1053LjogWJVeoRHneo+/NfG0pM5Y70REt4jRZNg7k2WzTheoh9oJhg5J9/7Hw90+lVmMDcGVwspEW2wXcfPz3V9bRGiSWL4LpycwLAV6sfZ4pdLPZtP/Ui6hi5U8xWBPq6mOLgjFvbYbFL5hQACtYDY5r9TbYNYQLq50977Kojnh3+ndhPjFEDipd0PvmfNTGm3/lm9VZB8P0wg6I6KLLtLikzTBdSFWTGlulyj4jxt8XImH5PpMWbSK6dYQsTrmdO2ReJ+heDdCGlu73x3rFEEse/VsR4iJtIgtXbi8EkuTJMrw7HbrOjzmhBcXdM1QDL7BT7M+MgOW9Bi4fro7Z04zm4t+pGzfTILBHv6VwvdJ/Wx0UEmZix+lra8eeEG8+CpZYEz24EN4tAmzqly+KFTqkZr467z4Sz1T5tUpBSyDEtCYKlZhV/Csczp9qLJ8VGRu+Wod6NohGiaVAg0YP653XsnGYVwYLREdwPk/pBe50wKzZtNT6SyOiSaRf18lHooDYmilmjY/nenl7EqkLxmKSRkmO0IsOyG0ZMTvGPdWSRydbHe8v4eJ1RY8bqdYPuFAU5rc45Tmt9FMw3xY5ecrWgvxyLpvP5tHEtjvogn6Jh5bimWMF6u7RyQblL/e8fioWCaJhMIExVlbWcE9ulBVuN9EgtROHdIIDJXM5wdoUQwbjyw45spBfsb7FA0uVdP5jpdMGBWJmcMkYcu8VCsLn5BvXOCwZrFaht5YrRkh5iTJZ6SuQ4d/ONYHNblpgH0GAmzajhQCdbUrHWMURNFE2nFfmcvC1LsLVhD/bc7LVILAOUGQc368gd7XclKFXPk1hStHD2hj2K9a2cyCAwcDZJswOU8kX6Spmu7IcdsjhqXG/NfCunMO1Nvlj1gVCPrvAgzavScD6eg02+wvS3f2OiA6KrXfFCM+/MxfZvYdoHA6D64C69VAUXt2XavBwMIEz1yAicLRbUDIty6dvb9eHNeTkyQhhzmMihpcNE5Ith7yi67VuZq8NEhGkeM3PrmeKBOzpvx8xQ2EaHx9YBRLh+oS5z1zeZYeHQA4iECY6mQro3maJ9tQKby6OpBLuHlqF+X08N2IyRJcm8Hlom2DzODjb1vVG6V3yOj7MT7B10yLwrDSPzfNChwI/AvAM/HFUL+9jcnU9P7dhcgR+ofAd+1LYWfgj7COOO5w8rx/Mj9Xh+tNDH8wv8wQ134I/00MIf9jICfwzQCPwBUVr4o8NG4A+V08IfNzgCfxClFv6I0hH4w2u18Mcaj8AfeD0CfxS6FuOODopjui0eA7bRoUgx17aFdXxeA6Nj3m0L6zCMjoWwLazD6OhYDNvCOvc6OhbJtrDOXaNjkWwL62hLsIWzLawzNDoW0bawjtrRsaC2hXW8H5cX1rawjs/Hw4LD4XA4HA6Hw+FwOBwOh8PhcDic2fB/Yb61Kml9ExIAAAAASUVORK5CYII=">
                            <img id="profile-img" src="https://img.freepik.com/free-photo/handsome-confident-smiling-man-with-hands-crossed-chest_176420-18743.jpg?w=2000">
                        <!-- </div> -->
                        <div class="text-info">
                            <h1>
                                Fabricio Werdum 31 <i class="fa-solid fa-mars"></i>
                            </h1>
                            <p>Sao Paulo, Brazil</p>
                            <p>Native language: <span>ENGLISH</span></p>
                            <p>Learning: <span>SPANISH</span> <span>JAPANESE</span> <span>KOREAN</span> </p>
                            <p>Interests: <span>SOCCER</span> <span>Jiu-Jitsu</span>    
                                <div class="socials">
                                    <i class="fa-brands fa-instagram"></i>
                                    <i class="fa-brands fa-square-facebook"></i>
                                </div>
                        </div>
                    </div>
                    <div>
                        <p class="edit-profile"><i class="fa-solid fa-pen-to-square"></i> EDIT PROFILE </p>
                    </div>
                </section>
            </div>
        </div>
                <section>
                    <h3>About me</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi, ducimus, possimus fugiat, ipsa libero reprehenderit earum nam modi nostrum molestiae voluptatum vitae est hic harum dolore quas quia ad repellat
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit doloremque nisi corporis numquam aspernatur quo consectetur dicta tempore incidunt aliquid esse aliquam, amet beatae? Iusto commodi perferendis deserunt quaerat modi!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus officiis itaque quasi? Exercitationem, sunt vero possimus, saepe assumenda repellendus molestiae optio architecto veniam veritatis officiis quis aut officia ab.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum praesentium distinctio architecto similique quia, excepturi illum inventore! Dicta suscipit officiis saepe doloribus porro. Ad laborum laboriosam voluptas odio dolor ipsa!.
                    </p>
                </section>
    </div>
    <?php include("dashboard_right.php"); ?>
</body>
</html>