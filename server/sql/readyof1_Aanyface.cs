using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Readyof_Aanyface
{
    #region Photos
    public class Photos
    {
        #region Member Variables
        protected int _id;
        protected string _title;
        protected string _username;
        protected string _userimg;
        protected string _date;
        protected string _verifay;
        protected string _img;
        protected unknown _created_at;
        protected int _like;
        #endregion
        #region Constructors
        public Photos() { }
        public Photos(string title, string username, string userimg, string date, string verifay, string img, unknown created_at, int like)
        {
            this._title=title;
            this._username=username;
            this._userimg=userimg;
            this._date=date;
            this._verifay=verifay;
            this._img=img;
            this._created_at=created_at;
            this._like=like;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Title
        {
            get {return _title;}
            set {_title=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Userimg
        {
            get {return _userimg;}
            set {_userimg=value;}
        }
        public virtual string Date
        {
            get {return _date;}
            set {_date=value;}
        }
        public virtual string Verifay
        {
            get {return _verifay;}
            set {_verifay=value;}
        }
        public virtual string Img
        {
            get {return _img;}
            set {_img=value;}
        }
        public virtual unknown Created_at
        {
            get {return _created_at;}
            set {_created_at=value;}
        }
        public virtual int Like
        {
            get {return _like;}
            set {_like=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Readyof_Aanyface
{
    #region Verifay_user
    public class Verifay_user
    {
        #region Member Variables
        protected int _id;
        protected string _username;
        protected string _userimg;
        protected string _useremail;
        protected string _userphone;
        protected string _password;
        #endregion
        #region Constructors
        public Verifay_user() { }
        public Verifay_user(string username, string userimg, string useremail, string userphone, string password)
        {
            this._username=username;
            this._userimg=userimg;
            this._useremail=useremail;
            this._userphone=userphone;
            this._password=password;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Userimg
        {
            get {return _userimg;}
            set {_userimg=value;}
        }
        public virtual string Useremail
        {
            get {return _useremail;}
            set {_useremail=value;}
        }
        public virtual string Userphone
        {
            get {return _userphone;}
            set {_userphone=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        #endregion
    }
    #endregion
}