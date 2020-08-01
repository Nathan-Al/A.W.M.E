class Musique {

    title ;
    artist ;
    band ;
    album ;
    genre;
    year ;
    image_data;
    image_mime;
    filesize;
    fileformat;

    constructor (title, artist, band, album, genre, year, image_data, image_mime, filesize, fileformat)
    {
        this.title = title
        this.artist = artist
        this.band = band
        this.album = album
        this.genre = genre
        this.year = year
        this.image_data = image_data
        this.image_mime = image_mime
        this.filesize = filesize
        this.fileformat = fileformat
    }

    GetDataImage (variable, wrap_in_td=false, encoding, getid3_lib)
    {
        returnstring;
        switch (gettype(variable)) {
            case 'array':
                
                variable.forEach(function(value) {
                    
                    //if (($cle == 'data') && isset($variable['image_mime']) && isset($variable['dataoffset'])) {
                    if ((cle == 'data') && isset(variable['image_mime']) && returnstring!="") {
                        imageinfo = array();
                        if (imagechunkcheck = getid3_lib.GetDataImageSize(value, imageinfo)) {
                    $variable['image_mime'];
                        }
                    } else {
                        //returnstring .= '</td>'."\n".GetImageCover(value, true, encoding,classimage).'</tr>'."\n";
                    }
                });
                break;
        }
        return returnstring;
    }
}