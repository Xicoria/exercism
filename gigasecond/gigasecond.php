<?php

/**
 * Function to return Gigasecond date
 *
 * @param DateTime $date
 * @return DateTime
 * @throws Exception
 */
function from(DateTime $date) {
    return (clone $date)->add(new DateInterval('PT1000000000S'));
}
