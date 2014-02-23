<?php

class LessonplansModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all songs from database
     */
    public function getAllLessonplans()
    {
        $sql = "SELECT * FROM lessonplans";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function getLessonplan($name)
    {
        $sql = "SELECT * FROM lessonplans WHERE name = :name";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name));

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetch();
    }
    /**
     * Add a song to database
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addLessonPlan($name, $title, $content)
    {
        // clean the input from javascript code for example
        /*
        $name = strip_tags($artist);
        $title = strip_tags($track);
        $content = strip_tags($link);
*/
        $sql = "INSERT INTO lessonplans (name, title, content) VALUES (:name, :title, :content)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':title' => $title, ':content' => $content));
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteLessonPlan($lessonPlanId)
    {
        $sql = "DELETE FROM lessonplans WHERE id = :lessonPlanId";
        $query = $this->db->prepare($sql);
        $query->execute(array(':lessonPlanId' => $lessonPlanId));
    }
}
