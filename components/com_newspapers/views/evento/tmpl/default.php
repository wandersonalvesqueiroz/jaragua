<?php

$document = JFactory::getDocument();
function dateFormatation($date)
{
    $date = explode('-', $date);
    return $date[2] . '/' . $date[1] . '/' . $date[0];
}

function removeHour($hour)
{
    return substr($hour, 0, 5);
}

foreach ($this->evento as $evento): ?>
    <div class="evento">
        <?php
        $image = 'images/amda.jpg';
        if (!empty($evento->image)) {
            $image = $evento->image;
        }

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        //DATA
        if (!empty(strtotime($evento->date_start)) && !empty(strtotime($evento->date_end))) {
            $data_inicio = new DateTime($evento->date_start);
            $data_fim = new DateTime($evento->date_end);
            // Resgata diferença entre as datas
            $dateInterval = $data_inicio->diff($data_fim);
            $dateEvent = '';
            $hourEvent = '';
            if ($dateInterval->days == 1) {
                if (($evento->hour_start != '00:00:00') && ($evento->hour_end != '00:00:00')) {
                    if ($evento->hour_start < $evento->hour_end) {
                        $dateEvent = dateFormatation($evento->date_start) . ' e ' . dateFormatation($evento->date_end);
                        $hourEvent = 'de ' . removeHour($evento->hour_start) . ' às ' . removeHour($evento->hour_end) . 'h';
                    }
                } elseif ($evento->hour_start != '00:00:00' && $evento->hour_end == '00:00:00') {
                    $dateEvent = dateFormatation($evento->date_start) . ' e ' . dateFormatation($evento->date_end);
                    $hourEvent = 'às ' . removeHour($evento->hour_start) . 'h';
                } elseif ($evento->hour_start == '00:00:00' && $evento->hour_end != '00:00:00') {
                    $dateEvent = dateFormatation($evento->date_start) . ' e ' . dateFormatation($evento->date_end);
                    $hourEvent = 'até às ' . removeHour($evento->hour_end) . 'h';
                } else {
                    $dateEvent = dateFormatation($evento->date_start) . ' e ' . dateFormatation($evento->date_end);
                }
            } elseif ($dateInterval->days > 1) {
                if (($evento->hour_start != '00:00:00') && ($evento->hour_end != '00:00:00')) {
                    if ($evento->hour_start < $evento->hour_end) {
                        $dateEvent = dateFormatation($evento->date_start) . ' à ' . dateFormatation($evento->date_end);
                        $hourEvent = 'de ' . removeHour($evento->hour_start) . ' às ' . removeHour($evento->hour_end) . 'h';
                    }
                } elseif ($evento->hour_start != '00:00:00' && $evento->hour_end == '00:00:00') {
                    $dateEvent = dateFormatation($evento->date_start) . ' à ' . dateFormatation($evento->date_end);
                    $hourEvent = 'às ' . removeHour($evento->hour_start) . 'h';
                } elseif ($evento->hour_start == '00:00:00' && $evento->hour_end != '00:00:00') {
                    $dateEvent = dateFormatation($evento->date_start) . ' à ' . dateFormatation($evento->date_end);
                    $hourEvent = 'até às ' . removeHour($evento->hour_end) . 'h';
                } else {
                    $dateEvent = dateFormatation($evento->date_start) . ' à ' . dateFormatation($evento->date_end);
                }
            } else {
                if (($evento->hour_start != '00:00:00') && ($evento->hour_end != '00:00:00')) {
                    if ($evento->hour_start < $evento->hour_end) {
                        $dateEvent = dateFormatation($evento->date_start);
                        $hourEvent = 'de ' . removeHour($evento->hour_start) . ' às ' . removeHour($evento->hour_end) . 'h';
                    }
                } elseif ($evento->hour_start != '00:00:00' && $evento->hour_end == '00:00:00') {
                    $dateEvent = dateFormatation($evento->date_start);
                    $hourEvent = 'às ' . removeHour($evento->hour_start) . 'h';
                } elseif ($evento->hour_start == '00:00:00' && $evento->hour_end != '00:00:00') {
                    $dateEvent = dateFormatation($evento->date_start);
                    $hourEvent = 'até às ' . removeHour($evento->hour_end) . 'h';
                } else {
                    $dateEvent = dateFormatation($evento->date_start);
                }
            }
        } else {
            if (($evento->hour_start != '00:00:00') && ($evento->hour_end != '00:00:00')) {
                if ($evento->hour_start < $evento->hour_end) {
                    $dateEvent = dateFormatation($evento->date_start);
                    $hourEvent = 'de ' . removeHour($evento->hour_start) . ' às ' . removeHour($evento->hour_end) . 'h';
                }
            } elseif ($evento->hour_start != '00:00:00' && $evento->hour_end == '00:00:00') {
                $dateEvent = dateFormatation($evento->date_start);
                $hourEvent = 'às ' . removeHour($evento->hour_start) . 'h';
            } elseif ($evento->hour_start == '00:00:00' && $evento->hour_end != '00:00:00') {
                $dateEvent = dateFormatation($evento->date_start);
                $hourEvent = 'até às ' . removeHour($evento->hour_end) . 'h';
            } else {
                $dateEvent = dateFormatation($evento->date_start);
            }
        }
        ?>

        <div class="evento-img">
            <figure>
                <span style="background-image: url(<?php echo $image; ?>)"></span>
            </figure>
        </div>


        <h1><?php echo $evento->name; ?></h1>

        <h2>
            <i class="fas fa-map-marker"></i> <?php echo $evento->local; ?>
            <span>(<?php if (!empty($evento->address)) echo $evento->address . ' | '; ?><?php echo $evento->city . ' - ' . $evento->uf; ?>)</span>
        </h2>

        <?php if (!empty($dateEvent)): ?>
            <h3>
                <i class="fas fa-calendar-alt"></i> <?php echo $dateEvent; ?>
                <?php if (!empty($hourEvent)): ?>
                    <span>(<?php echo $hourEvent; ?>)</span>
                <?php endif; ?>
            </h3>
        <?php endif; ?>

        <?php if (!empty($evento->description)): ?>
            <p><?php echo $evento->description; ?></p>
        <?php endif; ?>

        <?php if ($evento->subscription == 1): ?>
            <div>
                <a href="<?php echo JRoute::_('index.php?option=com_doings&view=inscrever&id=' . $evento->id); ?>" class="btn btn-a right">Inscreva-se</a>
            </div>
        <?php endif; ?>


    </div>
<?php endforeach; ?>

<script>
    jQuery(function ($) {
        $(window).on('resize', function () {

            $('.evento-img').each(function () {
                $(this).height($(this).width() * 0.75);
            });

        }).trigger('resize');
    });
</script>