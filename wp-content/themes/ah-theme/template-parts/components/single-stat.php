<?php 

$statistic = $args['stat_number'];
$suffix = $args['stat_suffix'];
$stat_text = $args['stat_text'];


?>

<div class="single-stat">
    <div class="stat-number stats-text">
        <?php if ($statistic) : ?>
            <span class="number">
                <?php 
                if (strlen($statistic) > 1) :
                    for ($i = 0; $i < strlen($statistic); $i++) :
                        if ($statistic == 0) :
                            $statistic = 10;
                        endif;
                        $cur_digit = substr($statistic, $i, 1);
                        if (is_numeric($cur_digit)) :
                            echo '<span class="digit">';
                            for ($j = 0; $j <= $cur_digit; $j++) :
                                if ($j == 10) :
                                    echo "<span class='digit-part'>0</span>";
                                    break;
                                else : 
                                    echo "<span class='digit-part'>$j</span>";
                                endif;
                            endfor;
                            echo '</span>';
                        else :
                            echo $cur_digit;
                        endif;
                    endfor;
                else :
                    echo '<span class="digit">';
                    if ($statistic == 0) :
                        $statistic = 10;
                    endif;
                    if (is_numeric($statistic)) :
                        for ($j = 0; $j <= $statistic; $j++) :
                            if ($j == 10) :
                                echo "<span class='digit-part'>0</span>";
                                break;
                            else : 
                                echo "<span class='digit-part'>$j</span>";
                            endif;
                        endfor;
                    else :
                        echo $statistic;
                    endif;
                    echo '</span>';
                endif;
                ?>
            </span>
        <?php endif; ?>
        <?php if ($suffix) : ?>
            <span class="suffix">
                <?php echo $suffix; ?>
            </span>
        <?php endif; ?>
    </div>
    <?php if ($stat_text) : ?>
        <div class="subtext stat-subtext">
            <?php echo $stat_text; ?>
        </div>
    <?php endif; ?>
</div>