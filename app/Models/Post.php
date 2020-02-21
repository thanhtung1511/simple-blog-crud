<?php

namespace App\Models;

use App\Models\Traits\Attribute\PostAttribute;
use App\Models\Traits\Method\PostMethod;
use App\Models\Traits\Relationship\PostRelationship;
use App\Models\Traits\Scope\PostScope;
use Cviebrock\EloquentSluggable\Sluggable;
use DateTime;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id;
 * @property User creator;
 * @property string title;
 * @property string slug;
 * @property string image
 * @property string image_link
 * @property string content;
 * @property bool published;
 * @property DateTime $created_at;
 * @property DateTime $updated_at;
 * @property ?DateTime $published_at;
 */
class Post extends Model
{
    use Sluggable,
        PostAttribute,
        PostMethod,
        PostScope,
        PostRelationship;

    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'image', 'content', 'published', 'published_at'];
    protected $dates = ['published_at'];
}
