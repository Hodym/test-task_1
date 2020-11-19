<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%element}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m201025_022621_create_element_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%element}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'description' => $this->text(),
            'param_done' => $this->double(5,2)->notNull(),
            'param_all' => $this->double(5,2)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-element-category_id}}',
            '{{%element}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-element-category_id}}',
            '{{%element}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-element-category_id}}',
            '{{%element}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-element-category_id}}',
            '{{%element}}'
        );

        $this->dropTable('{{%element}}');
    }
}
