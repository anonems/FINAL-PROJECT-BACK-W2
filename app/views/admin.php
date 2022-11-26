<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">

        <!-- USERS -->
            <table>
                <thead>
                    <tr>
                        <th colspan="4">User table</th>
                    </tr>
                    <tr>
                        <td>id</td>
                        <td>username</td>
                        <td>role</td>
                        <td>action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($users as $user):
                    ?>
                        <tr>
                            <td><?=$user->getId()?></td>
                            <td><?=$user->getUsername()?></td>
                            <td><?=$user->getRol()?></td>
                            <td>delete</td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>

        <!-- ARTICLES -->
            <table>
                <thead>
                    <tr>
                        <th colspan="4">User table</th>
                    </tr>
                    <tr>
                        <td>id</td>
                        <td>username</td>
                        <td>role</td>
                        <td>action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($articles as $article):
                    ?>
                        <tr>
                            <td><?=$article->getId()?></td>
                            <td><?=$article->getTitle()?></td>
                            <td><?=$article->getAuthor()?></td>
                            <td><?=$article->getPubdate()?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>

        <!-- COMMENTS -->

    </div>
</div>